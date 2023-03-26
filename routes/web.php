<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Route::get('/dash', function () {   
    return view('app');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/beranda', [AdminController::class, 'index'])->name('admin.beranda');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.user');

Route::get('/welcome', [HomeController::class, 'welcome'])->name('home.welcome');
