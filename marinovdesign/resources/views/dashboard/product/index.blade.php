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

    <div class="row">
        <div class="col-12">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <h5 class="card-title">List of all Products</h5>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Preview</th>
                                <th scope="col">Product</th>
                                <th scope="col">Category</th>
                                <th scope="col">Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Discount Price</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row" class="align-middle">
                                    @if($product->images->isNotEmpty())
                                    <img src="{{ $product->images->first()->image_url }}" alt="" style="width: 80px;" class="img-fluid">
                                    @endif
                                </th>
                                <td class="align-middle">
                                    <a href="#" class="text-primary fw-bold">
                                        {{$product->name}}
                                    </a>
                                </td>
                                <td class="align-middle">
                                    {{$product->category->display_name}}
                                </td>
                                <td class="align-middle">
                                    {{$product->type->display_name}}
                                </td>
                                <td class="align-middle">{{ $product->price }}€</td>
                                <td class="fw-bold align-middle">
                                    {{ $product->discount_percentage !== null ? $product->discount_percentage : 0 }}%
                                </td>

                                <td class="align-middle">
                                    {{ $product->discount_price !== null ? $product->discount_price . '€' : 'N/A' }}
                                </td>

                                <td class="align-middle">
                                    @if($product->stock !== 0)
                                    <span class="badge bg-success rounded-pill px-3 py-1">In stock <span>{{ $product->stock }}</span></span>
                                    @else
                                    <span class="badge bg-danger rounded-pill px-3 py-1">Out of Stock</span>
                                    @endif
                                </td>

                                <td class="align-middle">
                                    <a href="{{ route('products.show', $product->id) }}" class="mx-1">
                                        <i class="fa-solid fa-eye fa-lg"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="mx-1">
                                        <i class="fa-solid fa-pen-to-square fa-lg text-warning"></i>
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline mx-1">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-transparent border-0 p-0 text-primary">
                                            <i class="fa-solid fa-trash fa-lg text-danger"></i>
                                        </button>
                                    </form>
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