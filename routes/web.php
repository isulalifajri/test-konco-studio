<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
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
    Route::patch('product/updateStatus/{id}', [ProductController::class, 'updateStatus'])->name('updateStatus');
    Route::put('product/updateStok/{id}', [ProductController::class, 'updateStok'])->name('updateStok');
    Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
