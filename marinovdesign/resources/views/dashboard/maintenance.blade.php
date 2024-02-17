@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="mb-3">
        <h4>Maintenance</h4>
    </div>
    <div class="accordion-item accordion-header" id="accordionMaintenanceHeader">
                    <a type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#maintenanceForm" aria-expanded="true" aria-controls="collapseOne" href="#maintenanceForm">Add Maintenance Task ></a>
                </div>

    <div class="row my-3 border p-3">
        <div class="col-12 col-md-6 d-flex mx-auto p-0">
            <div class="accordion w-100 " id="accordionMaintenanceForm">
                <div id="maintenanceForm" class="accordion-collapse collapse show w-" aria-labelledby="accordionMaintenanceHeader" data-bs-parent="#accordionMaintenanceForm">
                    <div class="accordion-body p-0">
                        <form id="createMaintenanceForm" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label" for="maintenance_tip">Maintenance Tip</label>
                                <input class="form-control" type="text" name="maintenance_tip" id="maintenance_tip">
                            </div>
                            <button class="btn btn-primary mt-3">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 col-md-6 d-flex mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Maintenance Tip</th>
                            <th scope="col">Created</th>

                        </tr>
                    </thead>
                    <tbody id="maintenanceTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    
    // DISPLAY TABLE CONTENT
    fetchMaintenanceData();
    function fetchMaintenanceData() {
        $.ajax({
            type: "GET",
            url: 'api/maintenance',
            dataType: "json",
            success: function(data) {
                updateMaintenanceTable(data);

            },
            error: function(xhr, error){
                console.log(xhr.responseText);
                console.log(error);
            }
        })
    }
    
    function updateMaintenanceTable(maintenances) {
        let tableBody = $('#maintenanceTableBody');
        tableBody.empty();
        
        console.log(maintenances);

        $.each(maintenances, function(key, maintenance) {
            let row = $('<tr></tr>');
            row.append('<td>' + maintenance.id + '</td>');
            row.append('<td>' + maintenance.title + '</td>');
            row.append('<td>' + maintenance.maintenance_tip + '</td>');
            row.append('<td>' + maintenance.created_at + '</td>');
            tableBody.append(row);
        });
    }

    // MAKE NEW MAINTENANCE TASK
    $('#createMaintenanceForm').on('submit', function(e) {
        e.preventDefault();
        let formData = {
            'title': $('#title').val(),
            'maintenance_tip': $('#maintenance_tip').val()
        };

        $.ajax({
        type: "POST",
        url: '/api/maintenance',
        data: formData,
        success: response => {
            if (response.success === true) {
                alert('Maintenance task created successfully');
                fetchMaintenanceData();
                location.reload();
            }
        }, 
        error: function(xhr, error){
            console.log(xhr.responseText);
            console.log(error);
        }
    })

    })


    

});
</script>
@endsection


