<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Product;
use App\Models\ADM\Store;
use App\Models\ADM\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $store_id = Store::where('user_id',Auth()->user()->id)->first();
        if($store_id){
            $products = Product::where('store_id', $store_id->id)->get();
            return view('product.index', compact('products'));
        }   else {
            $products = null;
            return view('product.index', compact('products'));
        }
    }

    public function create()
    {
        $store_id = Store::where('user_id',Auth()->user()->id)->first();
        if($store_id){
            return view('product.create')->with(['categories' => Category::all()]);
        } else {
            $products = 0;
            return redirect(route('product.index', compact('products')))->with(['categories' => Category::where('store_id', $store_id)]);
        }
    }

    public function store(Request $request)
    {
        $loja = Store::where('user_id', Auth()->user()->id)->first();
        //dd($request);
        $product = Product::create([
            'store_id' => $loja->id,
            'name' => $request->nome,
            'description' => $request->descricao,
            'price' => $request->preco,
            'picture' => $request->foto,
            'category_id' => $request->category_id
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
