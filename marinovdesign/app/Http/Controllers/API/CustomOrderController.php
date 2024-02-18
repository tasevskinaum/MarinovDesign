<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomOrder;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function getAllImages()
    {
        $images = CustomOrder::latest()->pluck('image');

        if ($images->count() > 0) {
            return response()->json(['images' => $images->toArray()]);
        } else {
            return response()->json(['message' => 'No images found.'], 404);
        }
    }
}
