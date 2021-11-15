<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Address;
use App\Models\API\Customer;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json(Address::all());
    }

    public function store(Request $request)
    {
        $address = Address::create([
            'customer_id' => Customer::custumerID(auth('sanctum')->user()->id),
            'cep' => $request->cep,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'number' => $request->number,
            'main' => $request->main
        ]);
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
