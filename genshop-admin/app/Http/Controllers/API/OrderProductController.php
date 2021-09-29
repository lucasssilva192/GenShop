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
        $orderProduct = OrderProduct::create($request->all());
        return response()->json($orderProduct);
    }

    public function show(OrderProduct $orderProduct)
    {
        return response()->json($orderProduct);
    }

    public function update(Request $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->all());
        return response()->json($orderProduct);
    }

    public function destroy(OrderProduct $orderProduct)
    {
        $orderProduct->delete();
        return response()->json($orderProduct);
    }
}
