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
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        return response()->json(Address::where('customer_id', $customer_id)->get());
    }

    public function store(Request $request)
    {
        $address = Address::create([
            'customer_id' => Customer::custumerID(auth('sanctum')->user()->id),
            'name' => $request->name,
            'cep' => $request->cep,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'number' => $request->number,
            'complement' => $request->number,
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

    public function changemain(Address $address)
    {
        $addressOld = Address::where('main', "1")->first();
        $address->main = "1";
        $address->save();

        $addressOld->main = "0";
        $addressOld->save();

        return response()->json($address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json($address);
    }
}
