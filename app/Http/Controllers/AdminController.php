<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::paginate(5);
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
            //fungsi eloquent untuk menambah data
            User::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('admin.index')->with('success', 'User Berhasil Ditambahkan');
    }

    public function show($idUser)
    {
        $admin = User::find($idUser);
        return view('admin.detail', compact('admin'));
    }

    public function edit($idUser)
    {
        $admin = User::find($idUser);
        return view('admin.edit', compact('admin'));
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
        //fungsi eloquent untuk mengupdate data inputan kita
            User::find($idUser)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.index')->with('success', 'User Berhasil Diupdate');
    }

    public function destroy($idUser)
    {
        User::find($idUser)->delete();
        return redirect()->route('admin.index')
            -> with('success', 'User Berhasil Dihapus');
    }

    public function beranda() 
    {
        return view('admin.app');
    }
}
