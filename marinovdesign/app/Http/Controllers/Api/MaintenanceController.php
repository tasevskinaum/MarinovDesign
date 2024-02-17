<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $maintenanceData = Maintenance::all();

            return response()->json($maintenanceData, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Maintenance data not found', 'error' => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $maintenance_tip = $request->maintenance_tip;
        $created_at = now()->format('Y-m-d H:i:s');

        try {
            $maintenance = Maintenance::create([
                'title' => $title,
                'maintenance_tip' => $maintenance_tip,
                'created_at' => $created_at
            ]);
            return response()->json(['success' => true, 'message' => 'Maintenance task created successfully', 'data' => $maintenance], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create article', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
