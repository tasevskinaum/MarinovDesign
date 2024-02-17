<?php

namespace App\Http\Controllers;

use App\Http\Requests\Maintenance\MaintenanceStoreRequest;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::all();

        return view('dashboard.maintenance.index', compact('maintenances'));
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
    public function store(MaintenanceStoreRequest $request)
    {
        try {
            Maintenance::create([
                'title' => ucfirst($request->title),
                'maintenance_tip' => $request->tip
            ]);

            return redirect()
                ->route('maintenances.index')
                ->with(['success' => "Maintenance tip added."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('maintenances.index')
                ->with(['danger' => "An unexpected error occurred while saving the maintenance tip. Please try again!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaintenanceStoreRequest $request, Maintenance $maintenance)
    {
        try {
            $maintenance->title = $request->title;
            $maintenance->maintenance_tip = $request->tip;

            $maintenance->update();

            return redirect()
                ->route('maintenances.index')
                ->with(['success' => "Maintenance tip updated successfully."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('maintenances.index')
                ->with(['danger' => "An unexpected error occurred while edit maintenance tip. Please try again!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        try {
            $maintenance->delete();

            return redirect()
                ->route('maintenances.index')
                ->with(['success' => "Maintenance tip deleted."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('maintenances.index')
                ->with(['danger' => "An unexpected error occurred while deleting maintenance tip. Please try again!"]);
        }
    }
}
