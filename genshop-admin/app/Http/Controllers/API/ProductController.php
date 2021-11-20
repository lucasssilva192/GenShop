<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Category;
use App\Models\API\Product;
use GrahamCampbell\ResultType\Result;
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

    public function show(Product $product)
    {  
        return response()->json($product);
    }

    public function show_image(Product $product)
    {
        $path = public_path().'/img/products/'.$product->picture;
        return response()->file($path);
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->name.'%')->get();
        return response()->json($products);
    }

    public function search_category(Request $request)
    {
        $products = Product::where('category', 'like', '%'.$request->name.'%')->get();
        return response()->json($products);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
