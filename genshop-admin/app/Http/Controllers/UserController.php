<?php

namespace App\Http\Controllers;

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
        if(!$user || !Hash::check($request->password, $user->password)){
            error_log($request->email);
            return response()->json([
                'error' => 'Credenciais invalidas'
            ], 401);
        }
        else{
            //error_log($request);
            $data = [
                'nome' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken($request->device_name)->plainTextToken];
            return response()->json($data);
        }
    }
}
