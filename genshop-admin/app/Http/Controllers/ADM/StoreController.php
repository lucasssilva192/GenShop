<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::where('user_id', Auth()->user()->id)->first();
        return view('store.index', compact('store'));
    }

    public function create()
    {
        return view('store.create');
    }

    public function store(Request $request)
    {
        $loja = new Store();
        $loja->user_id = $request->user_id;
        $loja->name = $request->nome;
        $loja->cnpj = $request->cnpj;
        $loja->cellphone = $request->celular;
        $loja->telephone = $request->telefone;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/stores'),  $imageName);
            $loja->profile_pic = $imageName;
        }
        $loja->address = $request->endereco;
        $loja->save();
        session()->flash('success', 'Loja criada com sucesso');
        return redirect(route('store.index'));
    }

    public function show(Store $store)
    {
        return view('store.show')->with(['store' => $store]);
    }

    public function edit(Store $store)
    {
        return view('store.edit')->with('store', $store);
    }

    public function update(Request $request, Store $store)
    {
        $loja = Store::find($store->id);
        $loja->name = $request->nome;
        $loja->cnpj = $request->cnpj;
        $loja->cellphone = $request->celular;
        $loja->telephone = $request->telefone;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/stores'),  $imageName);
            $loja->profile_pic = $imageName;
        }
        $loja->address = $request->endereco;
        $loja->update();
        session()->flash('success', 'Loja atualizada com sucesso');
        return redirect(route('store.index'));
    }

    public function destroy(Store $store)
    {
        $store->delete();
        session()->flash('success', 'Loja excluída com sucesso');
        return redirect(route('store.index'));
    }
}
