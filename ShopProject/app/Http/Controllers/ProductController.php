<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_categories;
use DB;

class ProductController extends Controller
{
    public function ProductsMain()
    {
        $products = Product::all();
        $categories = Product_categories::all();

        return view('products', ['products'=> $products, 'product_categories'=> $categories]);
    }

    public function List()
    {
        $products = Product::all();

        return view('productList', ['products'=> $products]);
    }

    public function Add(Request $request)
    {
        $request->validate([
            'id.*'=>'required|distinct',
            'product_name'=>'required|min:3|max:20|unique:App\Models\Product,name',
            'price'=>'required|numeric|gte:0.01|lte:99999.99'
        ]);

        $product = new Product();
        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->product_category = Product_categories::select('id', 'name')->where('id','=',$request->category)->value('name');
        $product->category_id = $request->category;
        $product->save();

        return 'Produkt zostal dodany';
    }

    public function Edit($id)
    {
        $product = Product::find($id);
        $categories = Product_categories::all();

        return  view('productEdit',['product'=>$product, 'product_categories'=>$categories, 'selected_category'=>$product->category_id]);
    }

    public function Update($id, Request $request)
    {
        $product = Product::find($id);

        $request->validate([
            'product_name'=>'required|min:3|max:20',
            'price'=>'required|numeric|gte:0.01|lte:99999.99'
        ]);
       
        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->product_category = Product_categories::select('id', 'name')->where('id','=',$request->category)->value('name');
        $product->category_id = $request->category;
        $product->save();

        return redirect()->route('Product.List');
    }

    public function Delete($id)
    {
        Product::destroy($id);
        return redirect()->route('Product.List');
    }
}
