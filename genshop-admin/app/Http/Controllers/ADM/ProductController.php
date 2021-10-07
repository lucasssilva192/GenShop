<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $product = Product::create([
            'store_id' => $request->store_id,
            'name' => $request->nome,
            'description' => $request->descricao,
            'price' => $request->preco,
            'picture' => $request->foto
        ]);
        session()->flash('success', 'Produto criado com sucesso');
        return redirect(route('product.index'));
    }

    public function show(Product $product)
    {
        return view('product.show')->with(['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, Product $product)
    {
        $product = Product::where('id', $product->id)->update([
            'store_id' => $request->store_id,
            'name' => $request->nome,
            'description' => $request->descricao,
            'price' => $request->preco,
            'picture' => $request->foto
        ]);

        session()->flash('success', 'Produto alterado com sucesso');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Produto excluído com sucesso');
        return redirect(route('product.index'));
    }
}
