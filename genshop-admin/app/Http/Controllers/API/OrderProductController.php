<?php

namespace App\Http\Controllers;

use App\Models\API\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index()
    {
        return response()->json(OrderProduct::all());
    }

    public function store(Request $request)
    {
        $store = OrderProduct::create($request->all());
        return response()->json($store);
    }

    public function show(OrderProduct $store)
    {
        return response()->json($store);
    }

    public function update(Request $request, OrderProduct $store)
    {
        $store->update($request->all());
        return response()->json($store);
    }

    public function destroy(OrderProduct $store)
    {
        $store->delete();
        return response()->json($store);
    }
}
