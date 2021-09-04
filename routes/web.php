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


Auth::routes();

Route::resource('/messages', 'App\Http\Controllers\MessageController')->only(['index', 'create', 'store']);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('messages', 'App\Http\Controllers\Admin\MessageController')->only(['index', 'edit', 'update', 'destroy']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
