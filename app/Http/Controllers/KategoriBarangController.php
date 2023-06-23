<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBarang;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::paginate(5);
        return view('petugas.kategori_barang.index')->with('kategori_barangs', $kategori);
    }

    public function create()
    {
        return view('petugas.kategori_barang.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idKategori' => 'required',
            'namaKategori' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        KategoriBarang::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kategori.index')->with('success', 'KAtegori Barang Berhasil Ditambahkan');
    }

    public function destroy($idKategori)
    {
        KategoriBarang::find($idKategori)->delete();
        return redirect()->route('kategori.index')
            ->with('success', 'Kategori Barang Berhasil Dihapus');
    }

    public function show($idKategori)
    {
        $kategori = KategoriBarang::find($idKategori);
        $showModal = true;
        return view('petugas.kategori_barang.detail', compact('kategori', 'showModal'));
    }
    
    public function edit($idKategori)
    {
        $kategori = KategoriBarang::find($idKategori);
        $showModal = true;
        return view('petugas.kategori_barang.edit', compact('kategori', 'showModal'));
    }

    public function update(Request $request, string $idKategori)
    {
        //melakukan validasi data
        $request->validate([
            'idKategori' => 'required',
            'namaKategori' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        KategoriBarang::find($idKategori)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kategori.index')->with('success', 'Kategori Barang Berhasil Diupdate');
    }

    public function adminKategori()
    {
        $adminKategori = KategoriBarang::paginate(5);
        return view('admin.kategori_barang.index', compact('adminKategori'));
    }
}
