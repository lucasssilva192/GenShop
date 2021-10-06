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

    public function show(Tag $tag)
    {
        
    }

    public function edit(Tag $tag)
    {
        
    }

    public function update(Request $request, Tag $tag)
    {
        
    }

    public function destroy(Tag $tag)
    {
        
    }
}
