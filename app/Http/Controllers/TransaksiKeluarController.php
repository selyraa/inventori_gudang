<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKeluar;
use App\Models\Toko;
use App\Models\User;
use App\Models\Barang;
use App\Models\DetailBarang;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Response;


class TransaksiKeluarController extends Controller
{
    public function index()
    {
        $trkeluar = TransaksiKeluar::paginate(3);
        $user = User::where('role', '=', "0")->get();
        $toko = Toko::all();
        return view('petugas.trans_keluar.index', compact('trkeluar','user', 'toko'));
    }

    public function create()
    {
        $user = User::where('role', '=', "0")->get();
        $toko = Toko::all();
        return view('petugas.trans_keluar.create', compact('user', 'toko'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idTransaksiKeluar' => 'required',
            'idUser' => 'required',
            'idToko' => 'required',
            'tglTransaksiKeluar' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        TransaksiKeluar::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('trkeluar.index')->with('success', 'Data Transaksi Keluar Berhasil Ditambahkan');
    }

    public function show($idTransaksiKeluar)
    {
        $trkeluar = TransaksiKeluar::find($idTransaksiKeluar);
        $showModal = true;
        return view('petugas.trans_keluar.detail', compact('trkeluar', 'showModal'));
    }

    public function edit($idTransaksiKeluar)
    {
        $user = User::where('role', '=', "0")->get();
        $toko = Toko::all();
        $trkeluar = TransaksiKeluar::find($idTransaksiKeluar);
        $showModal = true;
        return view('petugas.trans_keluar.edit', compact('trkeluar', 'user', 'toko', 'showModal'));
    }

    public function update(Request $request, string $idTransaksiKeluar)
    {
        //melakukan validasi data
        $request->validate([
            'idTransaksiKeluar' => 'required',
            'idUser' => 'required',
            'idToko' => 'required',
            'tglTransaksiKeluar' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        TransaksiKeluar::find($idTransaksiKeluar)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('trkeluar.index')->with('success', 'Data Transaksi Keluar Berhasil Diupdate');
    }

    public function destroy($idTransaksiKeluar)
    {
        TransaksiKeluar::find($idTransaksiKeluar)->delete();
        return redirect()->route('trkeluar.index')
            ->with('success', 'Data Transaksi Keluar Berhasil Dihapus');
    }

    public function lapkeluar(Request $request)
    {
        $request->session()->put('tgl_mulai', $request->input('tgl_mulai'));
        $request->session()->put('tgl_selesai', $request->input('tgl_selesai'));

        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = DB::table('detail_keluars')
            ->join('transaksi_keluars', 'detail_keluars.idTransaksiKeluar', '=', 'transaksi_keluars.idTransaksiKeluar')
            ->join('users', 'transaksi_keluars.idUser', '=', 'users.idUser')
            ->join('tokos', 'transaksi_keluars.idToko', '=', 'tokos.idToko')
            ->join('detail_barangs', 'detail_keluars.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_keluars.idTransaksiKeluar', 'transaksi_keluars.tglTransaksiKeluar', 'users.nama as namaPetugas', 'tokos.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaJual', 'detail_keluars.jumlah as stok')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('transaksi_keluars.tglTransaksiKeluar', [$mulai, $selesai]);
            })
            ->orderBy('transaksi_keluars.idTransaksiKeluar', 'asc')
            ->get();

        $laporan = DB::table('detail_keluars')
            ->join('transaksi_keluars', 'detail_keluars.idTransaksiKeluar', '=', 'transaksi_keluars.idTransaksiKeluar')
            ->join('users', 'transaksi_keluars.idUser', '=', 'users.idUser')
            ->join('tokos', 'transaksi_keluars.idToko', '=', 'tokos.idToko')
            ->join('detail_barangs', 'detail_keluars.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_keluars.idTransaksiKeluar', 'transaksi_keluars.tglTransaksiKeluar', 'users.nama as namaPetugas', 'tokos.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaJual', 'detail_keluars.jumlah as stok')
            ->orderBy('transaksi_keluars.idTransaksiKeluar', 'asc')
            ->get();

        // Menghitung total harga untuk setiap laporan
        $laporan->map(function ($item) {
            $item->totalHarga = $item->hargaJual * $item->stok;
            return $item;
        });
        $filter->map(function ($item) {
            $item->totalHarga = $item->hargaJual * $item->stok;
            return $item;
        });
        return view('admin.laporan_keluar.index', compact('filter', 'laporan'));
    }

    public function filterTransKeluar(Request $request)
    {
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');

        $filter = TransaksiKeluar::when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
            return $query->whereBetween('tglTransaksiKeluar', [$mulai, $selesai]);
        })->get();

        $trkeluar = TransaksiKeluar::all();
        $showModal = true;
        return view('petugas.trans_keluar.filter', compact('filter', 'trkeluar', 'showModal'));
    }

    public function exportPDF(Request $request)
    {
        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = DB::table('detail_keluars')
            ->join('transaksi_keluars', 'detail_keluars.idTransaksiKeluar', '=', 'transaksi_keluars.idTransaksiKeluar')
            ->join('users', 'transaksi_keluars.idUser', '=', 'users.idUser')
            ->join('tokos', 'transaksi_keluars.idToko', '=', 'tokos.idToko')
            ->join('detail_barangs', 'detail_keluars.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_keluars.idTransaksiKeluar', 'transaksi_keluars.tglTransaksiKeluar', 'users.nama as namaPetugas', 'tokos.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaJual', 'detail_keluars.jumlah as stok')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('transaksi_keluars.tglTransaksiKeluar', [$mulai, $selesai]);
            })
            ->get();

        $laporan = DB::table('detail_keluars')
            ->join('transaksi_keluars', 'detail_keluars.idTransaksiKeluar', '=', 'transaksi_keluars.idTransaksiKeluar')
            ->join('users', 'transaksi_keluars.idUser', '=', 'users.idUser')
            ->join('tokos', 'transaksi_keluars.idToko', '=', 'tokos.idToko')
            ->join('detail_barangs', 'detail_keluars.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_keluars.idTransaksiKeluar', 'transaksi_keluars.tglTransaksiKeluar', 'users.nama as namaPetugas', 'tokos.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaJual', 'detail_keluars.jumlah as stok')
            ->get();

        $laporan->map(function ($item) {
            $item->totalHarga = $item->hargaJual * $item->stok;
            return $item;
        });
        $filter->map(function ($item) {
            $item->totalHarga = $item->hargaJual * $item->stok;
            return $item;
        });

        $keluar = DB::table('transaksi_keluars')
            ->select('tglTransaksiKeluar')
            ->orderBy('tglTransaksiKeluar', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalPertama = $keluar->first()->tglTransaksiKeluar;

        // Mendapatkan tanggal terakhir
        $tanggalTerakhir = $keluar->last()->tglTransaksiKeluar;

        $pdf = PDF::loadView('admin.laporan_keluar.export_pdf', compact('laporan', 'filter', 'mulai', 'selesai', 'tanggalPertama', 'tanggalTerakhir'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
