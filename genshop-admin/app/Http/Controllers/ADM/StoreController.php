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
        switch ($request->tipo) {
            case 1:
                $loja->type = "Restaurante";
                break;
            case 2:
                $loja->type = "Ferraria";
                break;
            case 3:
                $loja->type = "Lembranças";
                break;
            case 4:
                $loja->type = "Mercado";
                break;
            case 5:
                $loja->type = "Alquimia";
                break;
            case 6:
                $loja->type = "Móveis";
                break;
            case 7:
                $loja->type = "Paisagismo";
                break;
            case 8:
                $loja->type = "Pesca";
                break;
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
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
        return redirect(route('store.index'));
    }

    public function destroy(Store $store)
    {
        $store->delete();
        session()->flash('success', 'Loja excluída com sucesso');
        return redirect(route('store.index'));
    }

    public function stores()
    {
        dd('a');
        
    }

    public function show_store(Store $store)
    {
        return view('store.show_store')->with('store', $store);
    }

    public function edit_store(Store $store)
    {
        return view('store.edit_store')->with('store', $store);
    }
}
