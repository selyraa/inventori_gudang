<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\TransaksiMasuk;
use App\Models\DetailBarang;

class DetailBarangController extends Controller
{
    public function index(){
        $detailbrg = DetailBarang::paginate(3);
        $barang = Barang::all();
        $trmasuk = TransaksiMasuk::all();
        return view('petugas.detail_barang.index', compact('detailbrg', 'barang', 'trmasuk'));
    }

    public function create()
    {
        $barang = Barang::all();
        $trmasuk = TransaksiMasuk::all();
        return view('petugas.detail_barang.create', compact('barang', 'trmasuk'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailBarang' => 'required',
            'idBarang' => 'required',
            // 'idTransaksiMasuk' => 'required',
            'tglProduksi' => 'required',
            'tglExp' => 'required',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
            'stok' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            DetailBarang::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('detailbrg.index')->with('success', 'Detail Barang Berhasil Ditambahkan');
    }

    public function show($idDetailBarang)
    {
        $detailbrg = DetailBarang::find($idDetailBarang);
        $showModal = true;
        return view('petugas.detail_barang.detail', compact('detailbrg', 'showModal'));
    }

    public function edit($idDetailBarang)
    {
        $barang = Barang::all();
        $trmasuk = TransaksiMasuk::all();
        $detailbrg = DetailBarang::find($idDetailBarang);
        $showModal = true;
        return view('petugas.detail_barang.edit', compact('barang', 'trmasuk', 'detailbrg','showModal'));
    }

    public function update(Request $request, string $idDetailBarang)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailBarang' => 'required',
            'idBarang' => 'required',
            // 'idTransaksiMasuk' => 'required',
            'tglProduksi' => 'required',
            'tglExp' => 'required',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
            'stok' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            DetailBarang::find($idDetailBarang)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('detailbrg.index')->with('success', 'Detail Barang Berhasil Diupdate');
    }
    
    public function destroy($idDetailBarang)
    {
        DetailBarang::find($idDetailBarang)->delete();
        return redirect()->route('detailbrg.index')-> with('success', 'Detail Barang Berhasil Dihapus');
    }
}
