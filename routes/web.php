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

Route::get('/user', [App\Http\Controllers\UserController::class, 'list'])->middleware(['auth']);
Route::get('/userAddress', [App\Http\Controllers\UserAddressController::class, 'list'])->middleware(['auth']);
Route::get('/userAddressCreate', [App\Http\Controllers\UserAddressController::class, 'create'])->middleware(['auth']);
Route::get('/userAddressCreateAction', [App\Http\Controllers\UserAddressController::class, 'createAction'])->middleware(['auth']);
Route::get('/userAddressDelete/{id}', [App\Http\Controllers\UserAddressController::class, 'delete'])->middleware(['auth']);

