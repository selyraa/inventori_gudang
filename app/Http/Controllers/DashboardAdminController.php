<?php

namespace App\Http\Controllers;

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
        $retur = DB::table('detail_returs')->count();

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

        $masuk = DB::table('transaksi_masuks')
            ->select('tglTransaksiMasuk')
            ->orderBy('tglTransaksiMasuk', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalPertama = $masuk->first()->tglTransaksiMasuk;

        // Mendapatkan tanggal terakhir
        $tanggalTerakhir = $masuk->last()->tglTransaksiMasuk;

        $keluar = DB::table('transaksi_keluars')
            ->select('tglTransaksiKeluar')
            ->orderBy('tglTransaksiKeluar', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalAwal = $keluar->first()->tglTransaksiKeluar;

        // Mendapatkan tanggal terakhir
        $tanggalAkhir = $keluar->last()->tglTransaksiKeluar;

        $penurunanProfit = DB::table('penggantian_barangs')
            ->selectRaw('SUM(penguranganProfit) AS penurunanProfit')
            ->value('penurunanProfit');

        $dataPenguranganProfit = DB::table('penggantian_barangs')
            ->select(DB::raw('MONTH(tglPenggantian) AS Bulan, SUM(penguranganProfit) AS TotalPenguranganProfit'))
            ->groupBy('Bulan')
            ->orderBy('Bulan')
            ->get();



        return view('admin.dashboard', compact(
            'pengguna',
            'supplier',
            'toko',
            'trmasuk',
            'trkeluar',
            'totalPengeluaran',
            'totalPemasukan',
            'masuk',
            'tanggalPertama',
            'tanggalTerakhir',
            'keluar',
            'tanggalAwal',
            'tanggalAkhir',
            'retur',
            'penurunanProfit',
            'dataPenguranganProfit',
        ));
    }
}
