<?php

namespace App\Http\Controllers;

use App\Http\Requests\Material\MaterialStoreRequest;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();

        return view('dashboard.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialStoreRequest $request)
    {
        try {
            Material::create([
                'name' => strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $request->name))),
                'display_name' => $request->name
            ]);

            return redirect()
                ->route('materials.index')
                ->with(['success' => "Material {$request->name} added."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('materials.index')
                ->with(['danger' => "An unexpected error occurred while saving the material. Please try again!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('dashboard.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialStoreRequest $request, Material $material)
    {
        try {
            $material->display_name = $request->name;
            $material->name = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $request->name)));

            $material->update();

            return redirect()
                ->route('materials.index')
                ->with(['success' => "Material updated successfully."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('materials.index')
                ->with(['danger' => "An unexpected error occurred while edit material. Please try again!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        try {
            $material->delete();

            return redirect()
                ->route('materials.index')
                ->with(['success' => "Material {$material->display_name} deleted."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('materials.index')
                ->with(['danger' => "An unexpected error occurred while deleteing the material. Please try again!"]);
        }
    }
}
