<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::all());
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return response()->json($cart);
    }

    public function show(Cart $cart)
    {
        return response()->json($cart);
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->all());
        return response()->json($cart);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json($cart);
    }
}
