<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('orderproducts', function()
{
    return view('orderProducts');
});

Route::get('users', function()
{
    return view('users');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('homepage');
    });

    Route::get('homepage', function()
    {
        return view('homepage');
    })->name('homepage');

    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'OrdersMain'])->name('Order.OrdersMain');
    Route::get('/orders/list', [App\Http\Controllers\OrderController::class, 'List'])->name('Order.List');
    Route::post('/orders/add', [App\Http\Controllers\OrderController::class, 'AddOrder'])->name('Order.AddOrder');
    Route::post('/orders/list/filter', [App\Http\Controllers\OrderController::class, 'filter'])->name('Order.Filter');
    
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'ProductsMain'])->name('Product.ProductsMain');
    Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'Add'])->name('Product.AddProduct');
    Route::get('/products/list', [App\Http\Controllers\ProductController::class, 'List'])->name('Product.List');
    Route::get('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'Edit'])->name('Product.EditProduct');
    Route::put('/products/update/{id}', [App\Http\Controllers\ProductController::class, 'Update'])->name('Product.UpdateProduct');
    Route::delete('/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'Delete'])->name('Product.DeleteProduct');

    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'CategoriesMain'])->name('Category.CategoriesMain');
    Route::post('/categories/add', [App\Http\Controllers\CategoryController::class, 'Add'])->name('Category.AddCategory');
    Route::get('/categories/list', [App\Http\Controllers\CategoryController::class, 'List'])->name('Category.List');
    Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'Edit'])->name('Category.EditCategory');
    Route::put('/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'Update'])->name('Category.UpdateCategory');
    Route::delete('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'Delete'])->name('Category.DeleteCategory');
});
 
Auth::routes();
