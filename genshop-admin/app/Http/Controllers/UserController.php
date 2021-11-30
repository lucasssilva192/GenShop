<?php

namespace App\Http\Controllers;

use App\Models\API\Address;
use App\Models\API\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{

    function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        //Caso necessario validar durações do tokens para gerar novos.
        //if(!$user || !Hash::check($request->password, $user->password)){
        if(!$user || $request->password != $user->password){
            error_log($request->email);
            return response()->json([
                'error' => 'Credenciais invalidas'
            ], 401);
        }
        else{
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken($request->device_name)->plainTextToken];
            return response()->json($data);
        }
    }

    function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'device_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Dados incompativeis'
            ], 401);
        }
        else {
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'device_name' => $request->device_name,
                'permissions' => '1'
            ];

            $user = User::create($user);

            if(!$user) {
                error_log($request->email);
                return response()->json([
                    'error' => 'Falha ao cadastrar'
                ], 401);
            }
            else {
                $data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'token' => $user->createToken($request->device_name)->plainTextToken];
                return response()->json($data);
            }
        }
    }

    function loginToken(){
        $user = User::where('id', auth('sanctum')->user()->id)->first();
        //$customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        //$customer = Customer::where('id', $customer_id)->first();
        //$address = Address::where('customer_id', $customer_id)->where('main', "1")->first();
        if($user) {
            return response()->json([
                'success' => 'Usuario encontrato.'
            ]);
        }
        else {
            return response()->json([
                'error' => 'Usuario não encontrato.'
            ], 401);
        }
    }
}
