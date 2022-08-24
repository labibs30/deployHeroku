<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/products', [ProductController::class, 'index'])->middleware('auth');

Route::get('/dashboard/histories', function () {
    return view('dashboard.histories', [
        'title' => 'Halaman | Riwayat Pembelian'
    ]);
})->middleware('auth');
Route::get('/dashboard/categories', function () {
    return view('dashboard.categories', [
        'title' => 'Halaman | Kategori'
    ]);
})->middleware('auth');
// Route::get('/dashboard/crud', function () {
//     return view('dashboard.createx', [
//         'title' => 'Halaman | Tambah Produk atau Aksi'
//     ]);
// })->middleware('auth');
Route::get('/dashboard/detail/{product:slug}', [ProductController::class, 'show'])->middleware('auth');
Route::get('/dashboard/detail/{product:slug}/edit', [ProductController::class, 'edit'])->middleware(('auth'));
// Route::resource('/dashboard/detail', ProductController::class)->middleware('auth');
Route::put('/dashboard/detail/{id}', [ProductController::class, 'update'])->middleware(('auth'));


Route::get('/dashboard/crud/{product:id}', [AdminProductController::class, 'destroy'])->middleware(('auth'));


Route::get('/dashboard/create', [AdminProductController::class, 'create']);
Route::get('/dashboard/crud', [AdminProductController::class, 'index']);
Route::resource('/dashboard/crud', AdminProductController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);
Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('/dashboard/cart', [CartController::class, 'viewcart']);

Route::get('/dashboard/detail/checkSlug', [ProductController::class, 'checkSlug'])->middleware('auth');
// Auth::routes();

Route::get('/home/detail/{product:slug}', [UserController::class, 'show']);
Route::get('/pesan', [DetailController::class, 'index']);
Route::get('/home', [UserController::class, 'index']);

Route::get('/checkout', [CheckOutController::class, 'index']);




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
