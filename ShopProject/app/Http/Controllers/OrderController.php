<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_products;
use App\Models\Product;
use App\Models\Product_categories;
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
        $orders = DB::table('orders')
                        ->select('id', 'total_price', 'created_at')
                        ->orderBy('id')
                        ->paginate(5);
                        
        $order_products = Order_products::all();

        $products = Product::select('name')
                        ->get();

        return view('orderList', ['orders'=>  $orders, 'order_products' => $order_products, 'products' => $products]);
    }

    public function filter(Request $request)
    {
        $products = Product::select('name')
        ->get();

        $orders = Order::select('orders.id', 'total_price', 'created_at')
                        ->orderBy('orders.id')
                        ->join('order_products', 'orders.id', '=', 'order_products.order_id')
                        ->where('order_products.product_name','=',$request->filter)
                        ->paginate(100);
                        // ->get();
        $order_products = Order_products::all();
        return view('orderList', ['orders'=>  $orders, 'order_products' => $order_products, 'products' => $products]);
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

    public function Edit($id)
    {
        $order = Order::find($id);
        $order_products = Order_products::where('order_id',$id)->get();
      
        $names = array();
        $or_arr = $order_products->toArray();
        foreach ($or_arr as $prod) {
            array_push($names,$prod['product_name']);
        }
      
        $products = Product::all();
        
        foreach ($names as $name) {
            $products = $products->where('name','!=',$name);
        }
       
        $categories = Product_categories::all();

        return  view('orderEdit',['order'=>$order,'order_products'=>$order_products, 'product_categories'=>$categories, 'products'=>$products]);
    }

    public function EditQuantity($id, Request $request)
    {   
        $request->validate([
            'quantity'=>'required|integer|min:0'
        ]);

        $order_product = Order_products::find($id);
        $order_id = $order_product->order_id; 
        if($request->quantity > 0)
        {
            $order_product->quantity = $request->quantity;
            $order_product->save();
        }
        else
        {
            Order_products::destroy($id);
        }

        $this->CalculateTotalPrice($order_id);
        
        return redirect()->back();
     
    }

    public function AddProduct($id, Request $request)
    {
        $order = Order::find($id);
        $product = Product::where('id',$request->product_id)->first()->toArray();
       
        $order_products = new Order_products();
        $order_products->order_id = $id;
        $order_products->product_name = $product['name'];
        $order_products->product_price = $product['price'];
        $order_products->quantity = $request->quantity;
        $order_products->save();
        $this->CalculateTotalPrice($id);


        return redirect()->back();

    }

    private function CalculateTotalPrice($id)
    {
        $order_products = Order_products::where('order_id', $id)->get();
        $order = Order::find($id);
      
        $total_price = 0;
        foreach ($order_products as $product) {
            $price = $product->product_price *  $product->quantity;
            $total_price += $price;
        }
        $order->total_price =  $total_price;
        $order->save();
        return;
    }

    public function Delete($id)
    {
        Order::destroy($id);
        return redirect()->route('Order.List');
    }
}
