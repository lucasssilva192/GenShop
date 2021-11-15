<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
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
        $product = Product::create([
            'store_id' => $request->store_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'picture' => $image
        ]);
        return response()->json($product);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
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
        $product = Product::update([
            'store_id' => $request->store_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'picture' => $image
        ]);
        return response()->json($product);
    }

    public function show_image(Product $product)
    {
        $path = public_path().'/img/products/'.$product->picture;
        return response()->file($path);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
