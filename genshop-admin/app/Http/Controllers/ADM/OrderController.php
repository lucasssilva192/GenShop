<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index')->with('orders', Order::all());
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Order $order)
    {
        
    }

    public function edit(Order $order)
    {
        
    }

    public function update(Request $request, Order $order)
    {
        
    }

    public function destroy(Order $order)
    {
        
    }
}
