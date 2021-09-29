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
        if($request->image)
        {
            $image = $request->file('image')->store('product');
            $image = "storage/" . $image;
        }
        else
        {
            $image = "storage/product/imagem.jpg";
        }
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'cpf' => $request->cpf,
            'cellphone' => $request->cellphone,
            'telephone' => $request->telephone,
            'profile_pic' => $request->profile_pic
        ]);
        return response()->json($customer);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        if($request->image)
        {
            $image = $request->file('image')->store('product');
            $image = "storage/" . $image;
           if($product->image != "storage/product/imagem.jpg"){
                Storage::delete(str_replace('storage/','',$product->image));}
        }
        else
        {
            $image = "storage/product/imagem.jpg";
        }
        $customer = Customer::update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'cpf' => $request->cpf,
            'cellphone' => $request->cellphone,
            'telephone' => $request->telephone,
            'profile_pic' => $request->profile_pic
        ]);
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json($customer);
    }
}
