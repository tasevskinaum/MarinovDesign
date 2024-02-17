<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomOrder;

class CustomOrderController extends Controller
{
    function index(Request $request)
{
    
    $customOrders = CustomOrder::all();

    return response()->json($customOrders);
}
}

