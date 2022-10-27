<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/userForAdmin', [App\Http\Controllers\UserController::class, 'listForAdmin'])->name('userForAdmin');
    Route::get('/userAddress', [App\Http\Controllers\UserAddressController::class, 'list'])->name('my_address');
    Route::get('/userAddressCreate', [App\Http\Controllers\UserAddressController::class, 'create'])->name('create_address');
    Route::post('/userAddressCreateAction', [App\Http\Controllers\UserAddressController::class, 'createAction']);
    Route::get('/userAddressDeleteRequest/{id}', [App\Http\Controllers\UserAddressController::class, 'deleteRequest']);
    Route::get('/userAddress/{id}', [App\Http\Controllers\UserAddressController::class, 'userAddress']);    
});

