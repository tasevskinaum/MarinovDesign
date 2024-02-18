<?php

namespace App\Http\Controllers;

use App\Http\Requests\Type\TypeStoreRequest;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $types = Type::all();

        return view('dashboard.type.index', compact(['categories', 'types']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeStoreRequest $request)
    {
        try {
            Type::create([
                'name' => strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $request->name))),
                'display_name' => $request->name,
                'category_id' => $request->category
            ]);

            return redirect()
                ->route('types.index')
                ->with(['success' => "Type {$request->name} added."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('types.index')
                ->with(['danger' => "An unexpected error occurred while saving the type. Please try again!"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $categories = Category::all();
        return view('dashboard.type.edit', compact(['type', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeStoreRequest $request, Type $type)
    {
        try {
            $type->display_name = $request->name;
            $type->name = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $request->name)));
            $type->category_id = $request->category;
            $type->update();

            return redirect()
                ->route('types.index')
                ->with(['success' => "Type updated successfully."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('types.index')
                ->with(['danger' => "An unexpected error occurred while edit type. Please try again!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();

            return redirect()
                ->route('types.index')
                ->with(['success' => "Type {$type->display_name} deleted."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('types.index')
                ->with(['danger' => "An unexpected error occurred while deleting type. Please try again!"]);
        }
    }
}
