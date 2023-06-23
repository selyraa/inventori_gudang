<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailBarang;
use App\Models\ReturBarang;
use App\Models\DetailRetur;
use App\Models\TransaksiMasuk;

class DetailReturController extends Controller
{
    public function index()
    {
        $detailretur = DetailRetur::with('retur', 'detailbarang')->paginate(5);
        $detailbarang = DetailBarang::with('barang')->get();
        $trmasuk = TransaksiMasuk::with('suppliers')->get();
        $retur = ReturBarang::with('trmasuk')->get();
        return view('admin.detail_retur.index', compact('detailretur', 'detailbarang', 'retur', 'trmasuk'));
    }

    public function stokRetur($idDetailBarang)
    {
        $detailBarang = DetailBarang::findOrFail($idDetailBarang);
        $stok = $detailBarang->stok;

        return response()->json(['stok' => $stok]);
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailRetur' => 'required',
            'idRetur' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        DetailRetur::create($request->all());

        // Mengupdate stok barang di tabel detail barang
        $detailbarang = DetailBarang::find($request->idDetailBarang);
        $detailbarang->stok -= $request->jumlah;
        $detailbarang->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('detailretur.index')->with('success', 'Detail Data Retur Berhasil Ditambahkan');
    }

    public function show($idDetailRetur)
    {
        $detailretur = DetailRetur::find($idDetailRetur);
        $showModal = true;
        return view('admin.detail_retur.detail', compact('detailretur', 'showModal'));
    }

    public function edit($idDetailRetur)
    {
        $detailbarang = DetailBarang::with('barang')->get();
        $retur = ReturBarang::with('trmasuk')->get();
        $detailretur = DetailRetur::find($idDetailRetur);
        $showModal = true;
        return view('admin.detail_retur.edit', compact('detailbarang', 'retur', 'detailretur', 'showModal'));
    }

    public function update(Request $request, string $idDetailRetur)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailRetur' => 'required',
            'idRetur' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        $detailretur = DetailRetur::findOrFail($idDetailRetur);

        // Simpan stok lama sebelum diubah
        $stokLama = $detailretur->jumlah;

        // Update detail transaksi masuk
        $detailretur->update($request->all());

        $detailretur->idDetailBarang = $request->get('idDetailBarang');

        // Update stok barang di tabel barang
        $detailbarang = DetailBarang::find($detailretur->idDetailBarang);
        $detailbarang->stok -= ($request->jumlah - $stokLama);
        $detailbarang->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('detailretur.index')->with('success', 'Detail Data Retur Berhasil Diupdate');
    }

    public function destroy($idDetailRetur)
    {
        DetailRetur::find($idDetailRetur)->delete();
        return redirect()->route('detailretur.index')->with('success', 'Detail Data Retur Berhasil Dihapus');
    }
}
