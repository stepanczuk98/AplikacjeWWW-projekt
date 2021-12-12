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

Route::get('/', function () {
    return view('welcome');
});

Route::get('homepage', function()
{
    return view('homepage');
})->name('homepage');

Route::get('categories', function()
{
    return view('categories');
});

Route::get('products', function()
{
    return view('products');
});

Route::get('orderproducts', function()
{
    return view('orderProducts');
});

// Route::get('orders', function()
// {
//     return view('orders');
// });

Route::get('users', function()
{
    return view('users');
});

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'OrdersMain'])->name('Order.OrdersMain');
Route::get('/orders/list', [App\Http\Controllers\OrderController::class, 'List'])->name('Order.List');
Route::post('/orders/add', [App\Http\Controllers\OrderController::class, 'AddOrder'])->name('Order.AddOrder');
Route::post('/orders/list/filter', [App\Http\Controllers\OrderController::class, 'filter'])->name('Order.Filter');
