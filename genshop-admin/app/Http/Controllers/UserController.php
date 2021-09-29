<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'error' => 'Credenciais invalidas'
            ]);
        }
        else{
            return response()->json($user);
        }
    }
}
