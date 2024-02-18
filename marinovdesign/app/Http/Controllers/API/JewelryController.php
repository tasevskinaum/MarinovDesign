<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Models\Category;
use Illuminate\Http\Request;

class JewelryController extends Controller
{
    public function getTypes()
    {
        try {
            $jewelry = Category::where('name', 'jewelry')->get()->first();

            return response()
                ->json(
                    ['data' => TypeResource::collection($jewelry->types), 'status' => 'true'],
                    200
                );
        } catch (\Exception $e) {
            return response()
                ->json(
                    ['error' => 'An error occurred while fetching types', 'status' => 'false'],
                    500
                );
        }
    }
}
