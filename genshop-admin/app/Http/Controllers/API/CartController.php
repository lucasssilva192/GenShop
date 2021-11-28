<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Product;
use App\Models\API\Cart;
use App\Models\API\Customer;
use App\Models\API\ProductCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        //dd($request);
        $item = Cart::where([['product_id', '=',  $request['product_id']], ['customer_id', '=',  $customer_id]])->first();
        
        if($item){
            $item->update([
                'quantity' => $item->quantity + 1
            ]);
        } else{
            $cart = Cart::create([
                'customer_id' => $customer_id,
                'product_id' =>  $request['product_id'],
                'quantity' => intval($request['quantity'])
            ]);
            return response()->json($cart);
        }
        return response()->json($item);
    }

    public function show(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        $teste = [];
        $teste2 = [];
        $x = 0;
        $y = 0;
        $products_cart = Cart::where('customer_id', '=', $customer_id)->select('product_id', 'quantity')->get();
        //dd($products_cart);
        foreach($products_cart as $pc){
            $teste[$x] = Product::where('id', $pc->product_id)->first();
            $teste2[$y] = ProductCart::create([
                'customer_id' =>$customer_id,
                'c_id' => $teste[$x]->id,
                'store_id' => $teste[$x]->store_id,
                'name' => $teste[$x]->name,
                'price' => $teste[$x]->price,
                'quantity' => intval($pc->quantity)
            ]);
            $x = $x + 1;
            $y = $y + 1;
        }
        return response()->json($teste2);
    }



    public function remove(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);

        $item = Cart::where([['product_id', '=',  $request['product_id']], ['customer_id', '=',   $customer_id]])->first();

        if($item->quantity > 1){
            $item->update([
                'quantity' => $item->quantity - 1
            ]);
        } else {
            $item->delete();
        }
        return response()->json($item);
    }
}
