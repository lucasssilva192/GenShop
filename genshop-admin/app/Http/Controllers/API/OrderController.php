<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Cart;
use App\Models\API\Order;
use App\Models\API\Customer;
use App\Models\API\OrderProduct;
use App\Models\API\ProductCart;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        $valor_compra = 0;
        $ids = [];
        $x = 0;
        $ids_loja = ProductCart::where('customer_id', $customer_id)->get();
        foreach($ids_loja as $id_loja){
            $ids[$x] = $id_loja->store_id;
        }

        foreach($ids as $id){
            $itens = ProductCart::where('customer_id', $customer_id)->where('store_id', $id)->get();
            
            foreach($itens as $i) {
                $valor_compra += $i->price * $i->quantity;
            }
            
            $compra = new Order();
            $compra->customer_id = $customer_id;
            $compra->store_id = $id;
            $compra->address = " ";
            $compra->pagto = " ";
            $compra->price = $valor_compra;
            $compra->status = " ";
            $compra->save();
            foreach($itens as $i) {
                $produto_pedido = new OrderProduct();
                $produto_pedido->order_id = $compra->id;
                //$produto_pedido->product_id = $i->id;
                $produto_pedido->price = $i->price;
                $produto_pedido->qtd = $i->quantity;
                $produto_pedido->c_id = $i->c_id;
                $produto_pedido->name = $i->name;
                $produto_pedido->save();
            }
        }
        $c = Cart::where('customer_id', $customer_id)->get();
        $pc = ProductCart::where('customer_id', $customer_id)->get();
        foreach($c as $ce){
            $ce->delete();
        }
        foreach($pc as $pce){
            $pce->delete();
        }
        $orders = Order::where('customer_id', $customer_id)->orderby('created_at', 'desc')->first();
        return response()->json($orders);
    }

    public function finish_order(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        $order = Order::where('customer_id', $customer_id)->where('id', $request['order_id'])->first();
        $order->status = "Pedido efetuado";
        $order->pagto = $request['pagto'];
        $order->address =  $request['address'];
        $order->save();
        return response()->json($order);
    }

    public function index(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        $orders = Order::where('customer_id', $customer_id)->where('status', '<>', ' ')->get();
        return response()->json($orders);
    }

    public function products(Request $request)
    {
        $customer_id = Customer::custumerID(auth('sanctum')->user()->id);
        $products = OrderProduct::where('order_id', $request->order_id)->get();
        return response()->json($products);
    }

    public function show(Order $order)
    {
        return response()->json($order);
    }
}
