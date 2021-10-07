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
        return view('store.index')->with('stores', Store::all());
    }

    public function create()
    {
        return view('store.create');
    }

    public function store(Request $request)
    {
        if($request->foto_perfil){
            $image = $request->file('foto_perfil')->store('store');
            $image = "storage/" . $image;
        }else{
            $image = "storage/store/imagem.jpg";
        }
/*
        if ($request->imagem) {
            $imagem = $request->file('imagem')->store('/public/produtos');
            $imagem = str_replace('public/', 'storage/', $imagem);
            Storage::delete($produto->image);
            if (!$produto->imagem == 'storage/produtos/imagempadrao.png')
                Storage::delete($produto->imagem);
        } else {
            $imagem = $produto->imagem;
        }
*/
        $store = Store::create([
            'user_id' => $request->store_id,
            'name' => $request->nome,
            'cnpj' => $request->cnpj,
            'cellphone' => $request->celular,
            'telephone' => $request->telefone,
            'profile_pic' => $image,
            'address' => $request->endereco
        ]);
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
        //dd($store);
        $store = Store::where('id', $store->id)->update([
            'name' => $request->nome,
            'cnpj' => $request->cnpj,
            'cellphone' => $request->celular,
            'telephone' => $request->telefone,
            'profile_pic' => $request->foto_perfil,
            'address' => $request->endereco
        ]);

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
