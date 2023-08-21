<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('users', [AdminController::class, 'index'])->name('admin.index');
    Route::get('users/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('users/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('users/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
