<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ReturBarang;
use App\Models\User;
use App\Models\DetailRetur;
use App\Models\DetailBarang;
use App\Models\PenggantianBarang;
use App\Models\TransaksiMasuk;
use PDF;
use Illuminate\Http\Response;

class PenggantianBarangController extends Controller
{

    public function index()
    {
        $penggantian = PenggantianBarang::with('detailretur')->paginate(3);
        $detailretur = DetailRetur::with('retur')->get();
        return view('admin.penggantian_barang.index', compact('penggantian', 'detailretur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getStok($idDetailBarang)
    {
        $detailBarang = DetailBarang::findOrFail($idDetailBarang);
        $stok = $detailBarang->stok;

        return response()->json(['stok' => $stok]);
    }

    public function getJumlahRetur($idDetailRetur)
    {
        $detailRetur = DetailRetur::findOrFail($idDetailRetur);
        $jumlah = $detailRetur->jumlah;
        return response()->json(['jumlah' => $jumlah]);
    }

    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'idPenggantianBarang' => 'required',
            'idDetailRetur' => 'required',
            'jumlahPenggantian' => 'required',
            'selisihRetur' => 'required',
            'penguranganProfit' => 'required',
            'keterangan' => 'required',
            'tglPenggantian' => 'required',
        ]);
        // dd($request->idDetailBarang);
        // Fungsi eloquent untuk menambah data
        PenggantianBarang::create($request->all());

        // Mengupdate stok barang di tabel detail_barang
        $detailRetur = DetailRetur::find($request->idDetailRetur);
        $detailbarang = DetailBarang::find($detailRetur->idDetailBarang);
        $detailbarang->stok += $request->jumlahPenggantian;
        $detailbarang->save();

        // Jika data berhasil ditambahkan dan perubahan stok tersimpan, akan kembali ke halaman utama
        if ($detailbarang->save()) {
            return redirect()->route('penggantianbarang.index')->with('success', 'Penggantian Barang Retur Berhasil Ditambahkan');
        } else {
            // Jika terjadi kesalahan saat menyimpan perubahan stok, dapatkan pesan kesalahan
            $error = $detailbarang->getErrors()->all();
            return redirect()->back()->with('error', $error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idPenggantianBarang)
    {
        $penggantian = PenggantianBarang::find($idPenggantianBarang);
        $showModal = true;
        return view('admin.penggantian_barang.detail', compact('penggantian', 'showModal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idPenggantianBarang)
    {
        $detailretur = DetailRetur::with('retur')->get();
        $penggantian = PenggantianBarang::find($idPenggantianBarang);
        $showModal = true;
        return view('admin.penggantian_barang.edit', compact('detailretur', 'penggantian', 'showModal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idPenggantianBarang)
    {
        //melakukan validasi data
        $request->validate([
            'idPenggantianBarang' => 'required',
            'idDetailRetur' => 'required',
            'jumlahPenggantian' => 'required',
            'selisihRetur' => 'required',
            'penguranganProfit' => 'required',
            'keterangan' => 'required',
            'tglPenggantian' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        $penggantian = PenggantianBarang::findOrFail($idPenggantianBarang);

        // Update detail transaksi masuk
        $penggantian->update($request->all());

        $penggantian->idDetailRetur = $request->get('idDetailRetur');

        // Mengupdate stok barang di tabel detail_barang
        $detailRetur = DetailRetur::find($request->idDetailRetur);
        $detailbarang = DetailBarang::find($detailRetur->idDetailBarang);
        $detailbarang->stok += $request->jumlahPenggantian;
        $detailbarang->save();

        // Jika data berhasil ditambahkan dan perubahan stok tersimpan, akan kembali ke halaman utama
        if ($detailbarang->save()) {
            return redirect()->route('penggantianbarang.index')->with('success', 'Penggantian Barang Retur Berhasil Ditambahkan');
        } else {
            // Jika terjadi kesalahan saat menyimpan perubahan stok, dapatkan pesan kesalahan
            $error = $detailbarang->getErrors()->all();
            return redirect()->back()->with('error', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idPenggantianBarang)
    {
        PenggantianBarang::find($idPenggantianBarang)->delete();
        return redirect()->route('penggantianbarang.index')->with('success', 'Penggantian Barang Retur Berhasil Dihapus');
    }


    public function getDetailRetur($idDetailRetur)
    {
        $detailRetur = DetailRetur::find($idDetailRetur);

        if ($detailRetur) {
            $idDetailBarang = $detailRetur->idDetailBarang;
            $jumlah = $detailRetur->jumlah;

            return response()->json([
                'idDetailBarang' => $idDetailBarang,
                'jumlah' => $jumlah,
            ]);
        }

        return response()->json([
            'error' => 'Detail retur not found',
        ], 404);
    }

    public function getDetailBarang($idDetailBarang)
    {
        $detailBarang = DetailBarang::find($idDetailBarang);

        if ($detailBarang) {
            $hargaJual = $detailBarang->hargaJual;

            return response()->json([
                'hargaJual' => $hargaJual,
            ]);
        }

        return response()->json([
            'error' => 'Detail barang not found',
        ], 404);
    }

    public function lappenggantian(Request $request)
    {
        $request->session()->put('tgl_mulai', $request->input('tgl_mulai'));
        $request->session()->put('tgl_selesai', $request->input('tgl_selesai'));

        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = DB::table('penggantian_barangs')
            ->join('detail_returs', 'penggantian_barangs.idDetailRetur', '=', 'detail_returs.idDetailRetur')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->select('retur_barangs.idRetur', 'penggantian_barangs.tglPenggantian', 'detail_returs.jumlah as jumlahRetur', 'penggantian_barangs.jumlahPenggantian', 'penggantian_barangs.selisihRetur', 'penggantian_barangs.penguranganProfit', 'penggantian_barangs.keterangan')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('penggantian_barangs.tglPenggantian', [$mulai, $selesai]);
            })
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        $laporan =  DB::table('penggantian_barangs')
            ->join('detail_returs', 'penggantian_barangs.idDetailRetur', '=', 'detail_returs.idDetailRetur')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->select('retur_barangs.idRetur', 'penggantian_barangs.tglPenggantian', 'detail_returs.jumlah as jumlahRetur', 'penggantian_barangs.jumlahPenggantian', 'penggantian_barangs.selisihRetur', 'penggantian_barangs.penguranganProfit', 'penggantian_barangs.keterangan')
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        return view('admin.laporan_penggantian.index', compact('filter', 'laporan'));
    }

    public function exportPDF(Request $request)
    {
        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = DB::table('penggantian_barangs')
            ->join('detail_returs', 'penggantian_barangs.idDetailRetur', '=', 'detail_returs.idDetailRetur')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->select('retur_barangs.idRetur', 'penggantian_barangs.tglPenggantian', 'detail_returs.jumlah as jumlahRetur', 'penggantian_barangs.jumlahPenggantian', 'penggantian_barangs.selisihRetur', 'penggantian_barangs.penguranganProfit', 'penggantian_barangs.keterangan')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('penggantian_barangs.tglPenggantian', [$mulai, $selesai]);
            })
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        $laporan =  DB::table('penggantian_barangs')
            ->join('detail_returs', 'penggantian_barangs.idDetailRetur', '=', 'detail_returs.idDetailRetur')
            ->join('retur_barangs', 'detail_returs.idRetur', '=', 'retur_barangs.idRetur')
            ->select('retur_barangs.idRetur', 'penggantian_barangs.tglPenggantian', 'detail_returs.jumlah as jumlahRetur', 'penggantian_barangs.jumlahPenggantian', 'penggantian_barangs.selisihRetur', 'penggantian_barangs.penguranganProfit', 'penggantian_barangs.keterangan')
            ->orderBy('retur_barangs.idRetur', 'asc')
            ->get();

        $penggantian = DB::table('penggantian_barangs')
            ->select('tglPenggantian')
            ->orderBy('tglPenggantian', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalPertama = $penggantian->first()->tglPenggantian;

        // Mendapatkan tanggal terakhir
        $tanggalTerakhir = $penggantian->last()->tglPenggantian;

        $totalHargaLaporan = $laporan->sum('penguranganProfit');
        $totalHargaFilter = $filter->sum('penguranganProfit');

        $pdf = PDF::loadView('admin.laporan_penggantian.export_pdf', compact('laporan', 'filter', 'mulai', 'selesai', 'tanggalPertama', 'tanggalTerakhir', 'totalHargaLaporan', 'totalHargaFilter'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
