<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Route::get('/template', function(){
    return view('layouts.master');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category
//Route::resource('categories', CategoryController::class);

//location
//Route::resource('locations', LocationController::class);

//supplier


//Route::resource('suppliers', SupplierController::class);


/*
Route::get('/index', [SupplierController::class, 'index'])->name('suppliers/index');
Route::get('/create', [SupplierController::class, 'create'])->name('suppliers/create');
Route::post('/create', [SupplierController::class, 'store'])->name('suppliers/create');
Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('suppliers/edit');
Route::get('/delete/{id}', [SupplierController::class, 'destroy']);
Route::get('/show/{id}', [SupplierController::class, 'show'])->name('suppliers/show');
Route::post('/edit/{id}', [SupplierController::class, 'update']);
Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('suppliers/edit');
*/

//product
//Route::resource('products', ProductController::class);

//temp route
Route::get('/pos', function(){
    return view('pos');
});


//Route::resource('transactions', TransactionController::class);
//Route::get('/list-product', [TransactionController::class, 'listProduct'])->name('list-product');

//ADMIN
Route::group(['middleware'=>['auth','checklevel:admin']], function(){
    //categories
    Route::resource('categories', CategoryController::class);
    //location
    Route::resource('locations', LocationController::class);
    //supplier
    Route::resource('suppliers', SupplierController::class);
    //product
    Route::resource('products', ProductController::class);
    
});
//CASHIER
Route::group(['middleware'=>['auth','checklevel:cashier']], function(){
    
});
//BOTH USER
Route::group(['middleware'=>['auth','checklevel:admin,cashier']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('transactions', TransactionController::class);
    Route::get('/list-product', [TransactionController::class, 'listProduct'])->name('list-product');
});