<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::paginate(4);
        return view('admin.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.create');
    }

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
        return redirect()->route('admin.index')->with('success', 'User Berhasil Ditambahkan');
    }


    public function show($idUser)
    {
        $admin = User::find($idUser);
        $showModal = true;
        return view('admin.detail', compact('admin', 'showModal'));
    }

    public function edit($idUser)
    {
        $admin = User::find($idUser);
        $showModal = true;
        return view('admin.edit', compact('admin', 'showModal'));
    }

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
        return redirect()->route('admin.index')->with('success', 'User Berhasil Diupdate');
    }

    public function destroy($idUser)
    {
        User::find($idUser)->delete();
        return redirect()->route('admin.index')
            ->with('success', 'User Berhasil Dihapus');
    }

    public function beranda()
    {
        return view('admin.app');
    }
}
