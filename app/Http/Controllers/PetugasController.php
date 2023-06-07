<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::where('role', '=', "0")->paginate(3);
        return view('petugas.index')->with('pengguna', $pengguna);
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
        ]);

        // Menggunakan Hash::make untuk mengenkripsi password
        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->password);

        //fungsi eloquent untuk menambah data
        User::create($requestData);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('petugas.index')->with('success', 'Petugas Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($idUser)
    {
        $petugas = User::find($idUser);
        $showModal = true;
        return view('petugas.detail', compact('petugas', 'showModal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idUser)
    {
        $petugas = User::find($idUser);
        $showModal = true;
        return view('petugas.edit', compact('petugas', 'showModal'));
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
        ]);

        // Menggunakan Hash::make untuk mengenkripsi password
        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->password);

        //fungsi eloquent untuk mengupdate data inputan kita
        User::find($idUser)->update($requestData);
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
            ->with('success', 'Petugas Berhasil Dihapus');
    }
}
