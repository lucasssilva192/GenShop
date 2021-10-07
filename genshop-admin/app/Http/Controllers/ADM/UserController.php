<?php

namespace App\Http\Controllers\ADM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ADM\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        //Caso necessario validar durações do tokens para gerar novos.
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'error' => 'Credenciais invalidas'
            ]);
        }
        else{
            return response()->json($user->createToken($request->device_name)->plainTextToken);
        }
    }
}
