<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiMasukController;
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
    return view('landing_page');
});

// Route::get('/dash', function () {   
//     return view('app');
// });

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/beranda', [AdminController::class, 'beranda'])->name('admin.beranda');
    Route::resource('admin', AdminController::class);
    Route::get('/kategori', [KategoriBarangController::class, 'adminKategori'])->name('kategori');
    Route::get('/satuan', [SatuanBarangController::class, 'adminSatuan'])->name('satuan');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.user');
Route::get('/welcome', [HomeController::class, 'welcome'])->name('home.welcome');
// Route::resource('/kategori', [KategoriBarangController::class]);
Route::get('/petugas', [HomeController::class, 'pengguna'])->name('petugas.pengguna');
Route::resource('petugas', PetugasController::class);
Route::resource('kategori', KategoriBarangController::class);
Route::resource('satuan', SatuanBarangController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('barang', BarangController::class);


