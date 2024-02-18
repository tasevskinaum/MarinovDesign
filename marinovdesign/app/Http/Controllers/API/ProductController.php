<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::with('images', 'materials', 'maintenances')->get();

        try {
            return response()
                ->json(
                    ['data' => ProductResource::collection($products), 'status' => true],
                    200
                );
        } catch (\Exception $e) {
            return response()
                ->json(
                    ['error' => 'An error occurred while fetching products', 'status' => 'false'],
                    500
                );
        }
    }

    public function productsByType($type)
    {
        $products = Product::with('images', 'materials', 'maintenances')->where('type_id', $type)->get();

        try {
            return response()
                ->json(
                    ['data' => ProductResource::collection($products), 'status' => true],
                    200
                );
        } catch (\Exception $e) {
            return response()
                ->json(
                    ['error' => 'An error occurred while fetching products', 'status' => 'false'],
                    500
                );
        }
    }
}
