<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_products;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function OrdersMain()
    {
        $products = Product::all();

        return view('orders', ['products'=> $products]);
    }

    public function List()
    {
        $orders = Order::select('id', 'total_price', 'created_at')
                        ->orderBy('id')
                        ->get();
        $order_products = Order_products::all();


        return view('orderList', ['orders'=>  $orders, 'order_products' => $order_products]);
    }

    public function AddOrder(Request $request)
    {

       // dd($request->input());
        $request->validate([
            'id.*'=>'required|distinct',
            'quantity.*'=>'required|integer|min:1',
        ]);


        $order = new Order();
        $order->total_price = 0;
        $order->save();
        $price_sum = 0;
       for($i = 0; $i < count($request->id); $i++)
       {
            $order_products = new Order_products();
            $product = Product::where('id',$request->id[$i])->first()->toArray();

            $order_products->quantity = $request->quantity[$i];
            $order_products->product_name = $product['name'];
            $order_products->product_price = $product['price'];
            $price_sum += $product['price'] * $request->quantity[$i];
            $order_products->order_id =  $order->id;

            $order_products->save();
       }

       $order->total_price = $price_sum;
       $order->save();

       return 'success';
    }


}