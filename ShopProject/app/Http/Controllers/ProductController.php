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

    public function AddProduct(Request $request)
    {
        $request->validate([
            'id.*'=>'required|distinct',
        ]);

        $product = new Product();
        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->product_category = Product_categories::select('id', 'name')->where('id','=',$request->category)->value('name');
        $product->category_id = $request->category;
        $product->save();

        return 'success';
    }
}
