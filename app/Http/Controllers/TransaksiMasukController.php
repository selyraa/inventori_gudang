<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use App\Models\TransaksiMasuk;
use App\Models\Barang;
use App\Models\DetailBarang;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class TransaksiMasukController extends Controller
{
    public function index()
    {
        $user = User::where('role', '=', '0')->get();
        $trmasuk = TransaksiMasuk::paginate(3);
        $supplier = Supplier::all();

        return view('petugas.trans_masuk.index', compact('user', 'trmasuk', 'supplier'));
    }

    public function modalContent()
    {
        $users = User::where('role', '=', '0')->get();
        $supplier = Supplier::all();
        return view('petugas.trans_masuk.modal', compact('users', 'supplier'));
    }


    // public function create()
    // {
    //     $user = User::where('role', '=', "0")->get();
    //     $supplier = Supplier::all();
    //     return view('petugas.trans_masuk.create', compact('user', 'supplier'));
    // }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idTransaksiMasuk' => 'required',
            'idUser' => 'required',
            'idSupplier' => 'required',
            'tglTransaksiMasuk' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        TransaksiMasuk::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('trmasuk.index')->with('success', 'Data Transaksi Masuk Berhasil Ditambahkan');
    }

    public function show($idTransaksiMasuk)
    {
        $trmasuk = TransaksiMasuk::find($idTransaksiMasuk);
        $showModal = true;
        return view('petugas.trans_masuk.detail', compact('trmasuk', 'showModal'));
    }

    public function edit($idTransaksiMasuk)
    {
        $user = User::where('role', '=', "0")->get();
        $supplier = Supplier::all();
        $trmasuk = TransaksiMasuk::find($idTransaksiMasuk);
        $showModal = true;
        return view('petugas.trans_masuk.edit', compact('trmasuk', 'user', 'supplier', 'showModal'));
    }

    public function update(Request $request, string $idTransaksiMasuk)
    {
        //melakukan validasi data
        $request->validate([
            'idTransaksiMasuk' => 'required',
            'idUser' => 'required',
            'idSupplier' => 'required',
            'tglTransaksiMasuk' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        TransaksiMasuk::find($idTransaksiMasuk)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('trmasuk.index')->with('success', 'Data Transaksi Masuk Berhasil Diupdate');
    }

    public function destroy($idTransaksiMasuk)
    {
        // Menghapus data terkait di tabel detail_barangs
        // DetailBarang::where('idTransaksiMasuk', $idTransaksiMasuk)->delete();

        // Menghapus data transaksi masuk
        TransaksiMasuk::find($idTransaksiMasuk)->delete();

        return redirect()->route('trmasuk.index')->with('success', 'Data Transaksi Masuk Berhasil Dihapus');
    }
    public function lapmasuk(Request $request)
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

        $query = DB::table('detail_masuks')
            ->join('transaksi_masuks', 'detail_masuks.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('users', 'transaksi_masuks.idUser', '=', 'users.idUser')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_masuks.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_masuks.idTransaksiMasuk', 'transaksi_masuks.tglTransaksiMasuk', 'users.nama as namaPetugas', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaBeli', 'detail_barangs.hargaJual', 'detail_masuks.jumlah as stok');

        if ($filterMulai && $filterSelesai) {
            $query->whereBetween('transaksi_masuks.tglTransaksiMasuk', [$filterMulai, $filterSelesai]);
        }

        $laporan = $query->get();

        // Menghitung total harga untuk setiap laporan
        $laporan->map(function ($item) {
            $item->totalHarga = $item->hargaBeli * $item->stok;
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

        return view('admin.laporan_masuk.index', [
            'laporanPaginator' => $laporanPaginator,
            'filter' => $filter,
        ]);
    }

    public function exportPDF(Request $request)
    {
        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');
        $filter = DB::table('detail_masuks')
            ->join('transaksi_masuks', 'detail_masuks.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('users', 'transaksi_masuks.idUser', '=', 'users.idUser')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_masuks.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_masuks.idTransaksiMasuk', 'transaksi_masuks.tglTransaksiMasuk', 'users.nama as namaPetugas', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaBeli', 'detail_barangs.hargaJual', 'detail_masuks.jumlah as stok')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('transaksi_masuks.tglTransaksiMasuk', [$mulai, $selesai]);
            })
            ->get();

        $laporan = DB::table('detail_masuks')
            ->join('transaksi_masuks', 'detail_masuks.idTransaksiMasuk', '=', 'transaksi_masuks.idTransaksiMasuk')
            ->join('users', 'transaksi_masuks.idUser', '=', 'users.idUser')
            ->join('suppliers', 'transaksi_masuks.idSupplier', '=', 'suppliers.idSupplier')
            ->join('detail_barangs', 'detail_masuks.idDetailBarang', '=', 'detail_barangs.idDetailBarang')
            ->join('barangs', 'detail_barangs.idBarang', '=', 'barangs.idBarang')
            ->select('transaksi_masuks.idTransaksiMasuk', 'transaksi_masuks.tglTransaksiMasuk', 'users.nama as namaPetugas', 'suppliers.nama', 'barangs.namaBarang', 'detail_barangs.tglProduksi', 'detail_barangs.tglExp', 'detail_barangs.hargaBeli', 'detail_barangs.hargaJual', 'detail_masuks.jumlah as stok')
            ->get();

        $laporan->map(function ($item) {
            $item->totalHarga = $item->hargaBeli * $item->stok;
            return $item;
        });
        $filter->map(function ($item) {
            $item->totalHarga = $item->hargaBeli * $item->stok;
            return $item;
        });

        $masuk = DB::table('transaksi_masuks')
            ->select('tglTransaksiMasuk')
            ->orderBy('tglTransaksiMasuk', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalPertama = $masuk->first()->tglTransaksiMasuk;

        // Mendapatkan tanggal terakhir
        $tanggalTerakhir = $masuk->last()->tglTransaksiMasuk;

        $totalHargaLaporan = $laporan->sum('totalHarga');
        $totalHargaFilter = $filter->sum('totalHarga');

        $pdf = PDF::loadView('admin.laporan_masuk.export_pdf', compact('laporan', 'filter', 'mulai', 'selesai', 'tanggalPertama', 'tanggalTerakhir', 'totalHargaLaporan', 'totalHargaFilter'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    public function filterTransMasuk(Request $request)
    {
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');
        $user = User::where('role', '=', "0")->get();
        $trmasuk = TransaksiMasuk::all();
        $tmasuk = TransaksiMasuk::paginate(3);
        $supplier = Supplier::all();

        $filter = TransaksiMasuk::when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
            return $query->whereBetween('tglTransaksiMasuk', [$mulai, $selesai]);
        })->get();
        $showModal = true;
        return view('petugas.trans_masuk.filter', compact('filter', 'user', 'supplier', 'trmasuk', 'mulai', 'selesai', 'tmasuk', 'showModal'));
    }
}
