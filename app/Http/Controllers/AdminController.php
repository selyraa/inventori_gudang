<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.app');
    }

    public function pengguna(){
        $pengguna = User::all();
        return view('admin.pengguna')->with('users', $pengguna);
    }
}
