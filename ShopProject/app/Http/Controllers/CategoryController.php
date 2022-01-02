<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_categories;
use DB;

class CategoryController extends Controller
{
    public function CategoriesMain()
    {
        $categories = Product_categories::all();

        return view('categories', ['product_categories'=> $categories]);
    }

    public function List()
    {
        $categories = DB::table('product_categories')->paginate(5);
        return view('categoriesList', ['categories'=> $categories]);
    }

    public function Add(Request $request)
    {
        $request->validate([
            'category_name'=>'required|min:3|max:20|unique:App\Models\Product_categories,name',
        ]);

        $category = new Product_categories();
        $category->name = $request->category_name;
        $category->save();

        return 'Utworzono nowa kategorie';
    }

    public function Edit($id)
    {
        $category = Product_categories::find($id);

        return  view('categoriesEdit',['category'=>$category]);
    }

    public function Update($id, Request $request)
    {
        $category = Product_categories::find($id);

        $request->validate([
            'category_name'=>'required|min:3|max:20',
        ]);

        $category->name = $request->category_name;
        $category->save();

        return redirect()->route('Category.List');
    }

    public function Delete($id)
    {
        Product_categories::destroy($id);
        return redirect()->route('Category.List');
    }
}
