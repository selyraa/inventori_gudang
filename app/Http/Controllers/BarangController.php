<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\SatuanBarang;
use App\Models\KategoriBarang;
use App\Models\Supplier;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('petugas.data_barang.index')->with('barangs', $barang);
    }

    public function create()
    {
        $user = User::where('role', '=', "0")->get();
        $satuan = SatuanBarang::all();
        $kategori = KategoriBarang::all();
        $supplier = Supplier::all();
        return view('petugas.data_barang.create', compact('user', 'satuan', 'kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idBarang' => 'required',
            'idSupplier' => 'required',
            'idUser' => 'required',
            'idSatuan' => 'required',
            'idKategori' => 'required',
            'namaBarang' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            Barang::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Ditambahkan');
    }

    public function show($idBarang)
    {
        $barang = Barang::find($idBarang);
        return view('petugas.data_barang.detail', compact('barang'));
    }

    public function edit($idBarang)
    {
        $user = User::where('role', '=', "0")->get();
        $satuan = SatuanBarang::all();
        $kategori = KategoriBarang::all();
        $supplier = Supplier::all();
        $barang = Barang::find($idBarang);
        return view('petugas.data_barang.edit', compact('barang', 'user', 'satuan', 'kategori', 'supplier', 'barang'));
    }

    public function update(Request $request, string $idBarang)
    {
        //melakukan validasi data
        $request->validate([
            'idBarang' => 'required',
            'idSupplier' => 'required',
            'idUser' => 'required',
            'idSatuan' => 'required',
            'idKategori' => 'required',
            'namaBarang' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            Barang::find($idBarang)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Diupdate');
    }

    public function destroy($idBarang)
    {
        Barang::find($idBarang)->delete();
        return redirect()->route('barang.index')
            -> with('success', 'Data Barang Berhasil Dihapus');
    }

    public function adminBarang()
    {
        $adminBarang = Barang::all();
        return view('admin.data_barang.index')->with('barangs', $adminBarang);
    }
}
