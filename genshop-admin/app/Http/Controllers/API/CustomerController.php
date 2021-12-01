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
        $customer = Customer::where('id', $customer_id)->first();
        $customer->birth_date = date('d-m-Y',strtotime($customer->birth_date));
        if($customer) {
            return response()->json($customer);
        }
        else {
            return response()->json([
                'Cliente não encontrato.'
            ], 401);
        }
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
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        $customer = Customer::where('id', $customer_id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => date('Y-m-d',strtotime($request->birth_date)),
            'cpf' => $request->cpf,
            'cellphone' => $request->cellphone,
            'telephone' => $request->telephone,
            'profile_pic' => 'abc' /*$request->profile_pic*/
        ]);

        $customer = Customer::where('id', $customer_id)->first();
        $customer->birth_date = date('d-m-Y',strtotime($customer->birth_date));
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json($customer);
    }
}
