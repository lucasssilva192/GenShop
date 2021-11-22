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

    public function show(Store $store)
    {
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

    public function search_category(Request $request)
    {
        $store = Store::where('type', 'like', '%'.$request->name.'%')->get();
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
