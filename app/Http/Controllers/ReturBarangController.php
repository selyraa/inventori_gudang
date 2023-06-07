<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ReturBarang;
use App\Models\User;
use App\Models\TransaksiMasuk;
use PDF;
use Illuminate\Http\Response;

class ReturBarangController extends Controller
{
    public function index()
    {
        $retur = ReturBarang::paginate(3);
        $user = User::all();
        $trmasuk = TransaksiMasuk::all();
        return view('admin.data_retur.index', compact('retur', 'user', 'trmasuk'));
    }

    public function create()
    {
        $user = User::where('role', '=', "1")->get();
        $trmasuk = TransaksiMasuk::all();
        return view('admin.data_retur.index', compact('user', 'trmasuk'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idRetur' => 'required',
            'idTransaksiMasuk' => 'required',
            'idUser' => 'required',
            'tglRetur' => 'required',
        ]);
        // dd($request->idUser);
        //fungsi eloquent untuk menambah data
        ReturBarang::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('retur.index')->with('success', 'Data Retur Berhasil Ditambahkan');
    }

    public function show($idRetur)
    {
        $retur = ReturBarang::find($idRetur);
        $showModal = true;
        return view('admin.data_retur.detail', compact('retur', 'showModal'));
    }

    public function edit($idRetur)
    {
        $user = User::where('role', '=', "1")->get();
        $trmasuk = TransaksiMasuk::all();
        $retur = ReturBarang::find($idRetur);
        $showModal = true;
        return view('admin.data_retur.edit', compact('user', 'trmasuk', 'retur', 'showModal'));
    }

    public function update(Request $request, string $idRetur)
    {
        //melakukan validasi data
        $request->validate([
            'idRetur' => 'required',
            'idTransaksiMasuk' => 'required',
            'idUser' => 'required',
            'tglRetur' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        ReturBarang::find($idRetur)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('retur.index')->with('success', 'Data Retur Berhasil Diupdate');
    }

    public function destroy($idRetur)
    {
        ReturBarang::find($idRetur)->delete();
        return redirect()->route('retur.index')->with('success', 'Data Retur Berhasil Dihapus');
    }

    public function lapretur(Request $request)
    {
        $request->session()->put('tgl_mulai', $request->input('tgl_mulai'));
        $request->session()->put('tgl_selesai', $request->input('tgl_selesai'));

        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = DB::table('detail_returs')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->join('users', 'retur_barangs.idUser', '=', 'users.idUser')
            ->join('transaksi_masuks', 'retur_barangs.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_returs.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('retur_barangs.idRetur', 'retur_barangs.tglRetur', 'users.nama as namaAdmin', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_returs.jumlah as jumlahRetur')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('retur_barangs.tglRetur', [$mulai, $selesai]);
            })
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        $laporan = DB::table('detail_returs')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->join('users', 'retur_barangs.idUser', '=', 'users.idUser')
            ->join('transaksi_masuks', 'retur_barangs.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_returs.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('retur_barangs.idRetur', 'retur_barangs.tglRetur', 'users.nama as namaAdmin', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_returs.jumlah as jumlahRetur')
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        return view('admin.laporan_retur.index', compact('filter', 'laporan'));
    }

    public function exportPDF(Request $request)
    {
        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = DB::table('detail_returs')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->join('users', 'retur_barangs.idUser', '=', 'users.idUser')
            ->join('transaksi_masuks', 'retur_barangs.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_returs.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('retur_barangs.idRetur', 'retur_barangs.tglRetur', 'users.nama as namaAdmin', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_returs.jumlah as jumlahRetur')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('retur_barangs.tglRetur', [$mulai, $selesai]);
            })
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        $laporan = DB::table('detail_returs')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->join('users', 'retur_barangs.idUser', '=', 'users.idUser')
            ->join('transaksi_masuks', 'retur_barangs.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_returs.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('retur_barangs.idRetur', 'retur_barangs.tglRetur', 'users.nama as namaAdmin', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_returs.jumlah as jumlahRetur')
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        $retur = DB::table('retur_barangs')
            ->select('tglRetur')
            ->orderBy('tglRetur', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalPertama = $retur->first()->tglRetur;

        // Mendapatkan tanggal terakhir
        $tanggalTerakhir = $retur->last()->tglRetur;

        $pdf = PDF::loadView('admin.laporan_retur.export_pdf', compact('laporan', 'filter', 'mulai', 'selesai', 'tanggalPertama', 'tanggalTerakhir'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
