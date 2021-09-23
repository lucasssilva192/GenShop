<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all());
    }

    public function store(Request $request)
    {
        $product = Customer::create($request->all());
        return response()->json($product);
    }

    public function show(Customer $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Customer $product)
    {
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(Customer $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
