<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomOrder;

class CustomOrderController extends Controller
{
    public function index()
    {
        $customOrders = CustomOrder::all();

        return view('dashboard.custom-orders.index', compact('customOrders'));
}
}