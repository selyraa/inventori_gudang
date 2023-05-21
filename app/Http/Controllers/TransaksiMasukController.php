<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use App\Models\TransaksiMasuk;
use App\Models\Barang;
use App\Models\DetailBarang;
use Illuminate\Support\Facades\DB;


class TransaksiMasukController extends Controller
{
    public function index()
    {
        $trmasuk = TransaksiMasuk::all();
        return view('petugas.trans_masuk.index')->with('trmasuk', $trmasuk);
    }

    public function create()
    {
        $user = User::where('role', '=', "0")->get();
        $supplier = Supplier::all();
        return view('petugas.trans_masuk.create', compact('user', 'supplier'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idTransaksiMasuk' => 'required',
            'idUser' => 'required',
            'idSupplier' => 'required',
            'tglTransaksiMasuk' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        TransaksiMasuk::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('trmasuk.index')->with('success', 'Data Transaksi Masuk Berhasil Ditambahkan');
    }

    public function show($idTransaksiMasuk)
    {
        $trmasuk = TransaksiMasuk::find($idTransaksiMasuk);
        return view('petugas.trans_masuk.detail', compact('trmasuk'));
    }

    public function edit($idTransaksiMasuk)
    {
        $user = User::where('role', '=', "0")->get();
        $supplier = Supplier::all();
        $trmasuk = TransaksiMasuk::find($idTransaksiMasuk);
        return view('petugas.trans_masuk.edit', compact('trmasuk', 'user', 'supplier'));
    }

    public function update(Request $request, string $idTransaksiMasuk)
    {
        //melakukan validasi data
        $request->validate([
            'idTransaksiMasuk' => 'required',
            'idUser' => 'required',
            'idSupplier' => 'required',
            'tglTransaksiMasuk' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        TransaksiMasuk::find($idTransaksiMasuk)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('trmasuk.index')->with('success', 'Data Transaksi Masuk Berhasil Diupdate');
    }

    public function destroy($idTransaksiMasuk)
    {
        // Menghapus data terkait di tabel detail_barangs
        DetailBarang::where('idTransaksiMasuk', $idTransaksiMasuk)->delete();

        // Menghapus data transaksi masuk
        TransaksiMasuk::find($idTransaksiMasuk)->delete();

        return redirect()->route('trmasuk.index')->with('success', 'Data Transaksi Masuk Berhasil Dihapus');
    }


    public function lapmasuk(Request $request)
    {
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');

        $filter = DB::table('detail_masuks')
            ->join('transaksi_masuks', 'detail_masuks.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('users', 'transaksi_masuks.idUser', '=', 'users.idUser')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_masuks.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_masuks.idTransaksiMasuk', 'transaksi_masuks.tglTransaksiMasuk', 'users.nama as namaPetugas', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaBeli', 'detail_barangs.hargaJual', 'detail_masuks.jumlah as stok')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('transaksi_masuks.tglTransaksiMasuk', [$mulai, $selesai]);
            })
            ->get();

        $laporan = DB::table('detail_masuks')
            ->join('transaksi_masuks', 'detail_masuks.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('users', 'transaksi_masuks.idUser', '=', 'users.idUser')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_masuks.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_masuks.idTransaksiMasuk', 'transaksi_masuks.tglTransaksiMasuk', 'users.nama as namaPetugas', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaBeli', 'detail_barangs.hargaJual', 'detail_masuks.jumlah as stok')
            ->get();

        // Menghitung total harga untuk setiap laporan
        $laporan->map(function ($item) {
            $item->totalHarga = $item->hargaBeli * $item->stok;
            return $item;
        });
        $filter->map(function ($item) {
            $item->totalHarga = $item->hargaBeli * $item->stok;
            return $item;
        });
        return view('admin.laporan_masuk.index', compact('filter','laporan'));
    }
}
