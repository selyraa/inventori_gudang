<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiKeluarController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailMasukController;
use App\Http\Controllers\DetailKeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;

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
    Route::get('/beranda', [DashboardAdminController::class, 'dashboard'])->name('admin.beranda');
    Route::resource('admin', AdminController::class);
    Route::get('/kategori', [KategoriBarangController::class, 'adminKategori'])->name('kategori');
    Route::get('/satuan', [SatuanBarangController::class, 'adminSatuan'])->name('satuan');
    Route::get('/barang', [BarangController::class, 'adminBarang'])->name('barang');
    Route::get('/dashboardadm', [DashboardAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/lapmasuk', [TransaksiMasukController::class, 'lapmasuk'])->name('lapmasuk');
    Route::get('/lapkeluar', [TransaksiKeluarController::class, 'lapkeluar'])->name('lapkeluar');
    Route::get('/lapsupplier', [SupplierController::class, 'lapSupplier'])->name('lapSupplier');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.user');
Route::get('/welcome', [DashboardController::class, 'dashboard'])->name('home.welcome');
// Route::resource('/kategori', [KategoriBarangController::class]);
Route::get('/petugas', [HomeController::class, 'pengguna'])->name('petugas.pengguna');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('petugas.dashboard');
Route::resource('petugas', PetugasController::class);
Route::resource('kategori', KategoriBarangController::class);
Route::resource('satuan', SatuanBarangController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('barang', BarangController::class);
Route::resource('trmasuk', TransaksiMasukController::class);
Route::resource('toko', TokoController::class);
Route::resource('trkeluar', TransaksiKeluarController::class);
Route::resource('detailbrg', DetailBarangController::class);
Route::resource('detailmasuk', DetailMasukController::class);
Route::resource('detailkeluar', DetailKeluarController::class);




