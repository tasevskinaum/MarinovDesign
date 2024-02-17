@if(session($type))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="row justify-content-center">
                <div class="alert alert-{{ $type }}">
                    {{ session($type) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif