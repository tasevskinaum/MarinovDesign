@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Edit type</h1>

        </div>
    </div>

    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col">
            <span id="add-toggle" class="text-primary h6 cursor-pointer toggle-i">
                <span><strong>Edit type {{$type->display_name}} for {{$type->category->display_name}}</strong></span>
                <i class="fa-solid fa-angle-down fa-xl"></i>
            </span>
        </div>
    </div>

    <div class="row justify-content-center border rounded mb-4">
        <div class="col-md-6 col-lg-3 py-3">
            <form action="{{ route('types.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-2">
                    <label for="name">Type name</label>
                    <input type="text" class="form-control" name="name" placeholder="name . . ." value="{{ old('name', $type->display_name) }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="category">Select category</label>
                    <select name="category" class="form-control">
                        <option value="" disabled>Select category . .</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $type->category->id || old('category') == $category->id) selected @endif>{{ $category->display_name }}</option>
                        @endforeach
                    </select>


                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection