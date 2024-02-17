@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Materials</h1>

        </div>
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col">
            <span id="add-toggle" class="text-primary h6 cursor-pointer toggle-i">
                <span><strong>Add Material</strong></span>
                <i class="fa-solid fa-angle-down fa-xl rotate"></i>
            </span>
        </div>
    </div>

    <div id="add-form-row" class="row justify-content-center border rounded mb-4">
        <div class="col-md-6 col-lg-3 py-3">
            <form action="{{ route('materials.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Material name</label>
                    <input type="text" class="form-control" name="name" placeholder="name . . .">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>

    <div class="row mb-2 justify-content-center">
        <div class="col-md-8 col-lg-6 p-0">
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Materials
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Material</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materials as $material)
                            <tr>
                                <td>{{ $material->display_name }}</td>
                                <td class="text-end">
                                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" class="d-inline mx-1">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-transparent border-0 p-0 text-primary">
                                            <i class="fa-solid fa-trash fa-xl text-danger"></i>
                                        </button>
                                    </form>

                                    <a href="{{ route('materials.edit', $material->id) }}" class="mx-1">
                                        <i class="fa-solid fa-pen-to-square fa-xl text-warning"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    $("#add-toggle").click(function() {
        $("#add-form-row")
            .slideToggle();
        $(".fa-angle-down").toggleClass('rotate');
        $("#add-form-row").css("display", "flex");
    })
</script>
@endsection