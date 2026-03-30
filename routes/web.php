<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OngkirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.home');
})->name('welcome');

Route::get('/shop', function () {
    return view('user.shop');
})->name('shop');

Route::get('/show_order', function () {
    // Ambil data pesanan dari database
    $orders = \App\Models\Order::where('user_id', Auth::id())->get();

    // Kirim data pesanan ke view 'user.show_order'
    return view('user.show_order', ['orders' => $orders]);
})->name('show_order');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/view_catagory', [AdminController::class, 'view_category'])->name('view_category');
Route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('add_category');
Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory'])->name('delete_category');

Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::get('/show_product', [AdminController::class, 'show_product'])->name('show_product');
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');

Route::get('/product_detail/{id}', [HomeController::class, 'product_detail'])->name('product_detail');
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
Route::get('/make_order', [HomeController::class, 'make_order'])->name('make_order');

Route::get('/cek_ongkir', [OngkirController::class, 'index'])->name('cek_ongkir');
Route::post('/cek_ongkir', [OngkirController::class, 'cek_ongkir'])->name('cek_ongkir');

Route::post('/transaction', [HomeController::class, 'transaction'])->name('transaction');
Route::get('/success/{user_id}', [HomeController::class, 'success'])->name('success');


