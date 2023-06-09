<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanBarang;

class SatuanBarangController extends Controller
{
    public function index()
    {
        $satuan = SatuanBarang::paginate(3);
        return view('petugas.satuan_barang.index', compact('satuan'));
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
            ->with('success', 'Satuan Barang Berhasil Dihapus');
    }

    public function show($idSatuan)
    {
        $satuan = SatuanBarang::find($idSatuan);
        $showModal = true;
        return view('petugas.satuan_barang.detail', compact('satuan', 'showModal'));
    }

    public function edit($idSatuan)
    {
        $satuan = SatuanBarang::find($idSatuan);
        $showModal = true;
        return view('petugas.satuan_barang.edit', compact('satuan', 'showModal'));
    }

    public function update(Request $request, string $idSatuan)
    {
        //melakukan validasi data
        $request->validate([
            'idSatuan' => 'required',
            'namaSatuan' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        SatuanBarang::find($idSatuan)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('satuan.index')->with('success', 'Satuan Barang Berhasil Diupdate');
    }

    public function adminSatuan()
    {
        $adminSatuan = SatuanBarang::paginate(5);
        return view('admin.satuan_barang.index', compact('adminSatuan'));
    }
}
