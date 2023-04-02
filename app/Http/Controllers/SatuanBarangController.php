<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanBarang;

class SatuanBarangController extends Controller
{
    public function index(){
        $satuan = SatuanBarang::all();
        return view('petugas.satuan_barang.index')->with('satuan_barangs', $satuan);
    }

    public function create()
    {
        return view('petugas.satuan_barang.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idSatuan' => 'required',
            'namaSatuan' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            SatuanBarang::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('satuan.index')->with('success', 'Satuan Barang Berhasil Ditambahkan');
   
    }

    public function destroy($idSatuan)
    {
        SatuanBarang::find($idSatuan)->delete();
        return redirect()->route('satuan.index')
            -> with('success', 'Satuan Barang Berhasil Dihapus');
    }

    public function show($idSatuan)
    {
        $satuan = SatuanBarang::find($idSatuan);
        return view('petugas.satuan_barang.detail', compact('satuan'));
    }

    public function edit($idSatuan)
    {
        $satuan = SatuanBarang::find($idSatuan);
        return view('petugas.satuan_barang.edit', compact('satuan'));
    }


}
