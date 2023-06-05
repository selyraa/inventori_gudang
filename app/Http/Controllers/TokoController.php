<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::paginate(5);
        return view('petugas.toko.index')->with('toko', $toko);
    }

    public function create()
    {
        return view('petugas.toko.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idToko' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Toko::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('toko.index')->with('success', 'Data Toko Berhasil Ditambahkan');
    }

    public function show($idToko)
    {
        $toko = Toko::find($idToko);
        $showModal = true;
        return view('petugas.toko.detail', compact('toko', 'showModal'));
    }

    public function edit($idToko)
    {
        $toko = Toko::find($idToko);
        $showModal = true;
        return view('petugas.toko.edit', compact('toko', 'showModal'));
    }

    public function update(Request $request, string $idToko)
    {
        //melakukan validasi data
        $request->validate([
            'idToko' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Toko::find($idToko)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('toko.index')->with('success', 'Data Toko Berhasil Diupdate');
    }

    public function destroy($idToko)
    {
        Toko::find($idToko)->delete();
        return redirect()->route('toko.index')
            ->with('success', 'Data Toko Berhasil Dihapus');
    }
}
