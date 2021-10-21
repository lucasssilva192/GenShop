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
            return view('product.create')->with(['categories' => Category::where('store_id', Auth()->user()->id)->get()]);
        } else {
            $products = null;
            return redirect(route('product.index', compact('products')));
        }
    }

    public function store(Request $request)
    {
        $loja = Store::where('user_id', Auth()->user()->id)->first();
        $produto = new Product();

        $produto->store_id = $loja->id;
        $produto->name = $request->nome;
        $produto->description = $request->descricao;
        $produto->price = $request->preco;
        $produto->category_id = $request->category_id;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'),  $imageName);
            $produto->picture = $imageName;
        }
        $produto->save();

        session()->flash('success', 'Produto criado com sucesso');
        return redirect(route('product.index'));
    }

    public function show(Product $product)
    {
        $category = Category::find($product->category_id);
        return view('product.show')->with(['product' => $product, 'category' => $category]);
    }

    public function edit(Product $product)
    {
        return view('product.edit')->with(['product' => $product, 'categories' => Category::where('store_id', Auth()->user()->id)->get()]);
    }

    public function update(Request $request, Product $product)
    {
        $produto = Product::find($product->id);
        $produto->name = $request->nome;
        $produto->description = $request->descricao;
        $produto->price = $request->preco;
        $produto->category_id = $request->category_id;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'),  $imageName);
            $produto->picture = $imageName;
        }
        $produto->update();

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
