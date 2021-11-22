<?php

namespace App\Http\Controllers\ADM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ADM\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show')->with(['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
        $user->password = Hash::make($request->new_password);
        $user->update();
        session()->flash('success', 'Usuário atualizado com sucesso');
        return redirect(route('user.index'));
    }


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
           return view('home');
        } 
    }
}
