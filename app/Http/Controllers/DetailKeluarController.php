<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailBarang;
use App\Models\TransaksiKeluar;
use App\Models\DetailKeluar;

class DetailKeluarController extends Controller
{
    public function index()
    {
        $detailkeluar = DetailKeluar::paginate(5);
        $detailbarang = DetailBarang::with('barang')->get();
        $trkeluar = TransaksiKeluar::all();
        return view('petugas.detail_keluar.index', compact('detailkeluar', 'detailbarang', 'trkeluar'));
    }

    public function getStok($idDetailBarang)
    {
        $detailBarang = DetailBarang::findOrFail($idDetailBarang);
        $stok = $detailBarang->stok;

        return response()->json(['stok' => $stok]);
    }

    public function create()
    {
        $detailbarang = DetailBarang::with('barang')->get();
        $trkeluar = TransaksiKeluar::all();
        return view('petugas.detail_keluar.create', compact('detailbarang', 'trkeluar'));
    }


    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailKeluar' => 'required',
            'idTransaksiKeluar' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        DetailKeluar::create($request->all());

        // Mengupdate stok barang di tabel detail barang
        $detailbarang = DetailBarang::find($request->idDetailBarang);
        $detailbarang->stok -= $request->jumlah;
        $detailbarang->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('detailkeluar.index')->with('success', 'Detail Barang Keluar Berhasil Ditambahkan');
    }

    public function show($idDetailKeluar)
    {
        $detailkeluar = DetailKeluar::find($idDetailKeluar);
        return view('petugas.detail_keluar.detail', compact('detailkeluar'));
    }

    public function edit($idDetailKeluar)
    {
        $detailbarang = DetailBarang::with('barang')->get();
        $trkeluar = TransaksiKeluar::all();
        $detailkeluar = DetailKeluar::find($idDetailKeluar);
        return view('petugas.detail_keluar.edit', compact('detailbarang', 'trkeluar', 'detailkeluar'));
    }

    public function update(Request $request, string $idDetailKeluar)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailKeluar' => 'required',
            'idTransaksiKeluar' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        $detailKeluar = DetailKeluar::findOrFail($idDetailKeluar);

        // Simpan stok lama sebelum diubah
        $stokLama = $detailKeluar->jumlah;

        // Update detail transaksi masuk
        $detailKeluar->update($request->all());

        $detailKeluar->idDetailBarang = $request->get('idDetailBarang');

        // Update stok barang di tabel barang
        $detailbarang = DetailBarang::find($detailKeluar->idDetailBarang);
        $detailbarang->stok -= ($request->jumlah - $stokLama);
        $detailbarang->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('detailkeluar.index')->with('success', 'Detail Barang Keluar Berhasil Diupdate');
    }

    public function destroy($idDetailKeluar)
    {
        DetailKeluar::find($idDetailKeluar)->delete();
        return redirect()->route('detailkeluar.index')->with('success', 'Detail Barang Keluar Berhasil Dihapus');
    }
}
