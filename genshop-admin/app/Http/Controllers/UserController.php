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
        $data = [$user->name, $user->email, $user->createToken($request->device_name)->plainTextToken];
        //Caso necessario validar durações do tokens para gerar novos.
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'error' => 'Credenciais invalidas'
            ]);
        }
        else{
            return response()->json($data);
        }
    }
}
