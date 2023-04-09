<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::paginate(5);
        return view('admin.data_supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('admin.data_supplier.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idSupplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            Supplier::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('supplier.index')->with('success', 'Supplier Berhasil Ditambahkan');
    }

    public function show($idSupplier)
    {
        $supplier = Supplier::find($idSupplier);
        return view('admin.data_supplier.detail', compact('supplier'));
    }

    public function edit($idSupplier)
    {
        $supplier = Supplier::find($idSupplier);
        return view('admin.data_supplier.edit', compact('supplier'));
    }

    public function update(Request $request, string $idSupplier)
    {
        //melakukan validasi data
        $request->validate([
            'idSupplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            Supplier::find($idSupplier)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('supplier.index')->with('success', 'Supplier Berhasil Diupdate');
    }

    public function destroy($idSupplier)
    {
        Supplier::find($idSupplier)->delete();
        return redirect()->route('supplier.index')
            -> with('success', 'Supplier Berhasil Dihapus');
    }
}
