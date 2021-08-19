<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/*Rutas Usuario */



Route::resource('/users',UserController::class);
Route::PUT('/users/{id}/Deshabilitar', [App\Http\Controllers\UserController::class, 'Deshabilitar'])->name('users.Deshabilitar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
