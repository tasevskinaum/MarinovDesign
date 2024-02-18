<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function index()
    {
        $custom_orders = CustomOrder::all();

        return view('dashboard.custom-order.index', compact('custom_orders'));
    }
}
