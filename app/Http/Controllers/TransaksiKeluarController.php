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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class TransaksiKeluarController extends Controller
{
    public function index()
    {
        $trkeluar = TransaksiKeluar::paginate(3);
        $user = User::where('role', '=', "0")->get();
        $toko = Toko::all();
        return view('petugas.trans_keluar.index', compact('trkeluar', 'user', 'toko'));
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
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');

        if ($request->has('filter_tgl')) {
            $request->session()->put('tgl_mulai', $mulai);
            $request->session()->put('tgl_selesai', $selesai);
        } elseif ($request->has('reset_filter')) {
            $request->session()->forget('tgl_mulai');
            $request->session()->forget('tgl_selesai');
        }

        $filterMulai = $request->session()->get('tgl_mulai');
        $filterSelesai = $request->session()->get('tgl_selesai');

        $query = DB::table('detail_keluars')
            ->join('transaksi_keluars', 'detail_keluars.idTransaksiKeluar', '=', 'transaksi_keluars.idTransaksiKeluar')
            ->join('users', 'transaksi_keluars.idUser', '=', 'users.idUser')
            ->join('tokos', 'transaksi_keluars.idToko', '=', 'tokos.idToko')
            ->join('detail_barangs', 'detail_keluars.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_keluars.idTransaksiKeluar', 'transaksi_keluars.tglTransaksiKeluar', 'users.nama as namaPetugas', 'tokos.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaJual', 'detail_keluars.jumlah as stok')
            ->orderBy('transaksi_keluars.idTransaksiKeluar', 'asc');

        if ($filterMulai && $filterSelesai) {
            $query->whereBetween('transaksi_keluars.tglTransaksiKeluar', [$filterMulai, $filterSelesai]);
        }

        $laporan = $query->get();

        // Menghitung total harga untuk setiap laporan
        $laporan->map(function ($item) {
            $item->totalHarga = $item->hargaJual * $item->stok;
            return $item;
        });

        // Menghitung jumlah item per halaman
        $perPage = 5;

        // Mendapatkan nomor halaman saat ini dari query string (?page=)
        $currentPage = Paginator::resolveCurrentPage();

        // Membuat instance LengthAwarePaginator dengan data, jumlah item per halaman, dan halaman saat ini
        $laporanPaginator = new LengthAwarePaginator(
            $laporan->forPage($currentPage, $perPage),
            $laporan->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        $filter = null;
        if ($filterMulai && $filterSelesai) {
            $filter = $laporan;
        }
        return view('admin.laporan_keluar.index', [
            'laporanPaginator' => $laporanPaginator,
            'filter' => $filter,
        ]);
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

        $totalHargaLaporan = $laporan->sum('totalHarga');
        $totalHargaFilter = $filter->sum('totalHarga');

        $pdf = PDF::loadView('admin.laporan_keluar.export_pdf', compact('laporan', 'filter', 'mulai', 'selesai', 'tanggalPertama', 'tanggalTerakhir', 'totalHargaLaporan', 'totalHargaFilter'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
