<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::where('role', '=', "0")->get();
        return view('petugas.index')->with('users', $pengguna);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idUser' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'noTelp' => 'required',
            'role' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            User::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('petugas.index')->with('success', 'Petugas Berhasil Ditambahkan');
   
    }


    /**
     * Display the specified resource.
     */
    public function show($idUser)
    {
        $petugas = User::find($idUser);
        return view('petugas.detail', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idUser)
    {
        $petugas = User::find($idUser);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idUser)
    {
        //melakukan validasi data
        $request->validate([
            'idUser' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'noTelp' => 'required',
            'role' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            User::find($idUser)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('petugas.index')->with('success', 'Petugas Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idUser)
    {
        User::find($idUser)->delete();
        return redirect()->route('petugas.index')
            -> with('success', 'Petugas Berhasil Dihapus');
    }
}
