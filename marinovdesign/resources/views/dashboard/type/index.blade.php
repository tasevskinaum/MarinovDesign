@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Types</h1>

        </div>
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col">
            <span id="add-toggle" class="text-primary h6 cursor-pointer toggle-i">
                <span><strong>Add type</strong></span>
                <i class="fa-solid fa-angle-down fa-xl rotate"></i>
            </span>
        </div>
    </div>

    <div id="add-form-row" class="row justify-content-center border rounded mb-4">
        <div class="col-md-6 col-lg-3 py-3">
            <form action="{{ route('types.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Type name</label>
                    <input type="text" class="form-control" name="name" placeholder="name . . .">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="category">Select category</label>
                    <select name="category" class="form-control">
                        <option selected value="" disabled>Select category . .</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                        @endforeach
                    </select>
                    @error('category')
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
        <div class="col-md-8 p-0">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <span><strong>{{ $category->display_name }}</strong> types</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($category->types as $type)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $type->display_name }}</span>
                                <span>
                                    <a href="{{ route('types.edit', $type->id) }}" class="mx-1">
                                        <i class="fa-solid fa-pen-to-square fa-xl text-warning"></i>
                                    </a>
                                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" class="d-inline mx-1">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-transparent border-0 p-0 text-primary">
                                            <i class="fa-solid fa-trash fa-xl text-danger"></i>
                                        </button>
                                    </form>
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
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