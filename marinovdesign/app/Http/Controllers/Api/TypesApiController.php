<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesApiController extends Controller
{
    public function index()
    {
        $category = Category::where('name', 'jewelry')->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $categoryId = $category->id;

        $types = Type::where('category_id', $categoryId)->get();

        return response()->json([
            'category_id' => $categoryId,
            'category_name' => $category->name,
            'category_display_name' => $category->display_name,
            'types' => $types,
        ]);
    }
}
