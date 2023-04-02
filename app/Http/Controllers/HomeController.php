<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // return view('user', ['user' => $user]);
        return view('admin.app');
    }

    public function welcome(){
        return view('petugas.app_petugas');//buat view khusus untuk menu petugas
    }

    public function pengguna(){
        $pengguna = User::where('role', '', 0);
        return view('petugas.index')->with('users', $pengguna);
    }
}

