<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return view('frontend.page.home', [
        'title' => 'Halaman Home',
    ]);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', function(){
        return view('backend.page.dashboard', [
            'title' => 'Halaman Dashboard',
        ]);
    });   
    
    // product
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::get('product/tambah-data', [ProductController::class, 'create'])->name('tambah-data');
    Route::post('product/store', [ProductController::class, 'store'])->name('store');
    Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::patch('product/updateStatus/{id}', [ProductController::class, 'updateStatus'])->name('updateStatus');
    Route::put('product/updateStok/{id}', [ProductController::class, 'updateStok'])->name('updateStok');
    Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

    // customer 
    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
});
