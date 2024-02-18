@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col">
            <h1 class="h3">Products</h1>
        </div>
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col text-end">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create new Product</a>
        </div>
    </div>

</div>
@endsection