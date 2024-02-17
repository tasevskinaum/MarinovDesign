<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Category::create([
                'name' => strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $request->name))),
                'display_name' => $request->name
            ]);

            return redirect()
                ->route('categories.index')
                ->with(['success' => "Category {$request->name} added."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with(['danger' => "An unexpected error occurred while saving the category. Please try again!"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category->display_name = $request->name;
            $category->name = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $request->name)));

            $category->update();

            return redirect()
                ->route('categories.index')
                ->with(['success' => "Category updated successfully."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with(['danger' => "An unexpected error occurred while edit category. Please try again!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()
                ->route('categories.index')
                ->with(['success' => "Category {$category->display_name} deleted."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with(['danger' => "An unexpected error occurred while deleting category. Please try again!"]);
        }
    }
}
