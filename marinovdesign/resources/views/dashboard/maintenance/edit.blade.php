@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <h2>Edit maintenance tip</h2>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $maintenance->title) }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tip" class="form-label">Maintenance tip</label>
                    <textarea class="form-control" id="tip" name="tip" rows="4">{{ old('tip', $maintenance->maintenance_tip) }}</textarea>
                    @error('tip')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            <div class="mt-3">
                <a href="" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>


</div>
@endsection