<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function dashboard()
    {
        $pengguna = DB::table('users')->count();
        $supplier = DB::table('suppliers')->count();
        $toko = DB::table('tokos')->count();
        $trmasuk = DB::table('transaksi_masuks')->count();
        $trkeluar = DB::table('transaksi_keluars')->count();

        // Menghitung total pengeluaran
        $totalPengeluaran = DB::table('detail_masuks')
            ->join('transaksi_masuks', 'detail_masuks.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('detail_barangs', 'detail_masuks.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->selectRaw('SUM(detail_barangs.hargaBeli * detail_masuks.jumlah) AS totalPengeluaran')
            ->value('totalPengeluaran');

        // Menghitung total pemasukan
        $totalPemasukan = DB::table('detail_keluars')
            ->join('transaksi_keluars', 'detail_keluars.idTransaksiKeluar', '=', 'transaksi_keluars.idTransaksiKeluar')
            ->join('detail_barangs', 'detail_keluars.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->selectRaw('SUM(detail_barangs.hargaJual * detail_keluars.jumlah) AS totalPemasukan')
            ->value('totalPemasukan');

        return view('admin.dashboard', compact('pengguna', 'supplier', 'toko', 'trmasuk', 'trkeluar', 'totalPengeluaran', 'totalPemasukan'));
    }
}
