<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Order;
use App\Models\ADM\Store;
use App\Models\ADM\Customer;
use App\Models\ADM\Product;
use App\Models\API\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $store = Store::where('user_id', Auth()->user()->id)->first();
        if($store){
            return view('order.index')->with('orders', Order::where('store_id', $store->id)->get());
        } else {
            $store = Store::where('user_id', Auth()->user()->id)->first();
            return view('store.index')->with('store');
        }
    }


    public function show(Order $order)
    {
        $prod = []; $x = 0;
        $products = OrderProduct::where('order_id', $order->id)->get();
        foreach($products as $product){
            $prod[$x] = Product::where('id', $product->c_id)->first();
            $x = $x + 1;
        }
        return view('order.show')->with(['order' => $order, 'products' => $prod]);
    }

    public function edit(Order $order)
    {
        return view('order.edit')->with(['order' => $order]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request['status']]);
        $store = Store::where('user_id', Auth()->user()->id)->first();
        return view('order.index')->with('orders', Order::where('store_id', $store->id)->get());
    }
}
