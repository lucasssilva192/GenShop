<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Product;
use App\Models\ADM\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoresController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('store.stores')->with('stores', $stores);
    }

    public function show(Store $store)
    {
        $loja = Store::where('id', $store->id)->first();
        return view('store.show_store')->with('store', $loja);
    }

    public function edit(Store $store)
    {
        return view('store.edit_store')->with('store', $store);
    }

    public function update(Request $request, Store $store)
    {
        $loja = Store::find($store->id);
        $loja->name = $request->nome;
        $loja->cnpj = $request->cnpj;
        $loja->cellphone = $request->celular;
        $loja->telephone = $request->telefone;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/stores'),  $imageName);
            $loja->profile_pic = $imageName;
        }
        $loja->address = $request->endereco;
        $loja->update();
        session()->flash('success', 'Loja atualizada com sucesso');
        return redirect(route('stores.index'));
    }
}
