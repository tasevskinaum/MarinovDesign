@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Edit material</h1>

        </div>
    </div>

    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col">
            <span id="add-toggle" class="text-primary h6 cursor-pointer toggle-i">
                <span><strong>Edit Material {{$material->display_name}}</strong></span>
                <i class="fa-solid fa-angle-down fa-xl"></i>
            </span>
        </div>
    </div>

    <div class="row justify-content-center border rounded mb-4">
        <div class="col-md-6 col-lg-3 py-3">
            <form action="{{ route('materials.update', $material->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="name">Material name</label>
                    <input type="text" class="form-control" name="name" placeholder="name . . ." value="{{ old('name', $material->display_name) }}">
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
</div>
@endsection