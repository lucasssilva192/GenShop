<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Product;
use App\Models\API\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        return response()->json(Store::all());
    }


    public function store(Request $request)
    {
        if($request->image)
        {
            $image = $request->file('image')->store('product');
            $image = "storage/" . $image;
        }
        else
        {
            $image = "storage/product/imagem.jpg";
        }
        $store = Store::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'cellphone' => $request->cellphone,
            'telephone' => $request->telephone,
            'profile_pic' => $request->profile_pic,
            'address' => $request->address,
            'price' => $request->price,
            'image' => $image
        ]);
        $store = Store::create($request->all());
        return response()->json($store);
    }

    public function show(Store $store)
    {
        return response()->json($store);
    }

    public function update(Request $request, Store $store)
    {
        if($request->image)
        {
            $image = $request->file('image')->store('product');
            $image = "storage/" . $image;
           if($product->image != "storage/product/imagem.jpg"){
                Storage::delete(str_replace('storage/','',$product->image));}
        }
        else
        {
            $image = "storage/product/imagem.jpg";
        }
        $store = Store::update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'cellphone' => $request->cellphone,
            'telephone' => $request->telephone,
            'profile_pic' => $request->profile_pic,
            'address' => $request->address,
            'price' => $request->price,
            'image' => $image
        ]);
        return response()->json($store);
    }

    public function show_image(Store $store)
    {
        //$store = Store::find($id);
        $path = public_path() . '/img/stores/'. $store->profile_pic;
        return response()->file($path);
        //return $path;
    }

    public function search(Request $request)
    {
        $store = Store::where('name', 'like', '%'.$request->name.'%')->get();
        return response()->json($store);
    }

    public function products(Store $store)
    {
        $products = Product::where('store_id', $store->id)->get();
        return response()->json($products);
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return response()->json($store);
    }
}
