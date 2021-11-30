<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        return response()->json(Customer::where('id', $customer_id)->first());
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'user_id' => auth('sanctum')->user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => date('Y-m-d',strtotime($request->birth_date)),
            'cpf' => $request->cpf,
            'cellphone' => $request->cellphone,
            'telephone' => $request->telephone,
            'profile_pic' => 'abc' /*$request->profile_pic*/
        ]);
        if(!$customer){
            return response()->json([
                'error' => 'Dados incompativeis'
            ], 401);
        }
        else {
            return response()->json($customer);
        }

    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer = Customer::where('id', $request['id'])->update([
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
