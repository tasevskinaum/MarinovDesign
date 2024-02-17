<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomOrder;
use Intervention\Image\Facades\Image;



 function index()

{

    $customOrders = CustomOrder::all();


    return response()->json([

        'data' => $customOrders

    ]);

}


class CustomOrderController extends Controller
{
    public function index()

    {
    
        $customOrders = CustomOrder::all();
    
        return view('custom-orders.index', compact('customOrders'));
    
    }
    
    
    public function create()
    
    {
    
        return view('custom-orders.create');
    
    }
    
    
    public function store(Request $request)
    
    {
    
        $request->validate([
    
            'name' => 'required',
    
            'email' => 'required|email',
    
            'message' => 'required',
    
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            'link' => 'required|url',
    
        ]);
    
    
        $imageName = time().'.'.$request->image->extension();
    
        $request->image->move(public_path('images'), $imageName);
    
    
        CustomOrder::create([
    
            'name' => $request->name,
    
            'email' => $request->email,
    
            'message' => $request->message,
    
            'image' => $imageName,
    
            'link' => $request->link,
    
        ]);
    
    
        return redirect()->route('custom-orders.index')->with('success', 'Custom order created successfully.');
    
    }
    
    
    public function show(CustomOrder $customOrder)
    
    {
    
        return view('custom-orders.show', compact('customOrder'));
    
    }
    
    
    public function edit(CustomOrder $customOrder)
    
    {
    
        return view('custom-orders.edit', compact('customOrder'));
    
    }
    
    
    public function update(Request $request, CustomOrder $customOrder)
    
    {
    
        $request->validate([
    
            'name' => 'required',
    
            'email' => 'required|email',
    
            'message' => 'required',
    
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            'link' => 'required|url',
    
        ]);
    
    
        if ($request->hasFile('image')) {
    
            $imageName = time().'.'.$request->image->extension();
    
            $request->image->move(public_path('images'), $imageName);
    
        } else {
    
            $imageName = $customOrder->image;
    
        }
    
    
        $customOrder->update([
    
            'name' => $request->name,
    
            'email' => $request->email,
    
            'message' => $request->message,
    
            'image' => $imageName,
    
            'link' => $request->link,
    
        ]);
    
    
        return redirect()->route('custom-orders.index')->with('success', 'Custom order updated successfully.');
    
    }
}