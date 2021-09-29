<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json(Address::all());
    }

    public function store(Request $request)
    {
        $address = Address::create($request->all());
        return response()->json($address);
    }

    public function show(Address $address)
    {
        return response()->json($address);
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return response()->json($address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json($address);
    }
}
