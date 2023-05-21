<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\TransaksiMasuk;
use App\Models\DetailMasuk;
use App\Models\DetailBarang;

class DetailMasukController extends Controller
{
    public function index()
    {
        $detailmasuk = DetailMasuk::with('detailbarang')->get();
        return view('petugas.detail_masuk.index')->with('detailmasuk', $detailmasuk);
    }

    public function create()
    {
        $detailbarang = DetailBarang::with('barang')->get();
        $trmasuk = TransaksiMasuk::all();
        return view('petugas.detail_masuk.create', compact('detailbarang', 'trmasuk'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailMasuk' => 'required',
            'idTransaksiMasuk' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        DetailMasuk::create($request->all());

        // Mengupdate stok barang di tabel detail barang
        $detailbarang = DetailBarang::find($request->idDetailBarang);
        $detailbarang->stok += $request->jumlah;
        $detailbarang->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('detailmasuk.index')->with('success', 'Detail Barang Masuk Berhasil Ditambahkan');
    }

    public function show($idDetailMasuk)
    {
        $detailmasuk = DetailMasuk::with('detailbarang')->find($idDetailMasuk);
        return view('petugas.detail_masuk.detail', compact('detailmasuk'));
    }

    public function edit($idDetailMasuk)
    {
        $detailbarang = DetailBarang::with('barang')->get();
        $trmasuk = TransaksiMasuk::all();
        $detailmasuk = DetailMasuk::find($idDetailMasuk);
        return view('petugas.detail_masuk.edit', compact('detailbarang', 'trmasuk', 'detailmasuk'));
    }

    public function update(Request $request, string $idDetailMasuk)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailMasuk' => 'required',
            'idTransaksiMasuk' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        $detailMasuk = DetailMasuk::findOrFail($idDetailMasuk);

        // Simpan stok lama sebelum diubah
        $stokLama = $detailMasuk->jumlah;

        // Update detail transaksi masuk
        $detailMasuk->update($request->all());

        $detailMasuk->idDetailBarang = $request->get('idDetailBarang'); 

        // Update stok barang di tabel barang
        $detailbarang = DetailBarang::find($detailMasuk->idDetailBarang);
        $detailbarang->stok += ($request->jumlah - $stokLama);
        $detailbarang->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('detailmasuk.index')->with('success', 'Detail Barang Masuk Berhasil Diupdate');
    }

    public function destroy($idDetailMasuk)
    {
        DetailMasuk::find($idDetailMasuk)->delete();
        return redirect()->route('detailmasuk.index')->with('success', 'Detail Barang Masuk Berhasil Dihapus');
    }
}
