<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\TransaksiMasuk;
use App\Models\DetailMasuk;
use App\Models\DetailBarang;
use Illuminate\Support\Facades\DB;

class DetailMasukController extends Controller
{
    public function index()
    {
        $detailmasuk = DetailMasuk::with('detailBarang.barang:idBarang,namaBarang')->paginate(4);
        $trmasuk = TransaksiMasuk::all();

        $selectedIdTransaksiMasuk = request()->input('idTransaksiMasuk');
        $selectedTransaksiMasuk = null;
        $detail = [];

        if ($selectedIdTransaksiMasuk) {
            $selectedTransaksiMasuk = TransaksiMasuk::with('detailMasuks.detailBarang.barang')->find($selectedIdTransaksiMasuk);
            if ($selectedTransaksiMasuk) {
                $idSupplier = $selectedTransaksiMasuk->idSupplier;
                $detail = DetailBarang::whereHas('barang', function ($query) use ($idSupplier) {
                    $query->where('idSupplier', $idSupplier);
                })->get();
            }
        }

        return view('petugas.detail_masuk.index', compact('detail', 'detailmasuk', 'trmasuk', 'selectedIdTransaksiMasuk', 'selectedTransaksiMasuk'));
    }
    public function fetch(Request $request)
    {
        $idTransaksiMasuk = $request->idTransaksiMasuk;

        $detail = [];

        if ($idTransaksiMasuk) {
            $transaksiMasuk = TransaksiMasuk::find($idTransaksiMasuk);

            if (!$transaksiMasuk) {
                return response()->json($detail); // TransaksiMasuk tidak ditemukan, kembalikan respon kosong
            }

            $idSupplier = $transaksiMasuk->idSupplier;

            $detail = Barang::join('detail_barangs', 'barangs.idBarang', '=', 'detail_barangs.idBarang')
                            ->where('idSupplier', $idSupplier)
                            ->select('detail_barangs.idDetailBarang','barangs.idBarang', 'barangs.namaBarang')
                            ->get();
        }

        return response()->json($detail);
    }

    public function create()
    {
        $trmasuk = TransaksiMasuk::all(); // ambil semua data transaksi masuk
        $detail = []; // inisialisasi variabel detail sebagai array kosong

        if (request()->has('idTransaksiMasuk')) {
            // jika ada input idTransaksiMasuk pada form, ambil data supplier dan barang yang sesuai
            $idTransaksiMasuk = request()->input('idTransaksiMasuk');
            $idSupplier = TransaksiMasuk::find($idTransaksiMasuk)->idSupplier;
            $barang = Barang::where('idSupplier', $idSupplier)->get();

            // tambahkan data barang ke dalam variabel detail
            foreach ($barang as $b) {
                $detail[] = [
                    'idBarang' => $b->idBarang,
                    'namaBarang' => $b->namaBarBarang
                ];
            }
        }
        return redirect()->route('detailmasuk.index')->with('showModal', true);
    }

    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'idDetailMasuk' => 'required',
            'idTransaksiMasuk' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);
        // dd($request->idDetailBarang);
        // Fungsi eloquent untuk menambah data
        DetailMasuk::create($request->all());

        // Mengupdate stok barang di tabel detail_barang
        $detailbarang = DetailBarang::find($request->idDetailBarang);
        $detailbarang->stok += $request->jumlah;
        $detailbarang->save();

        // Jika data berhasil ditambahkan dan perubahan stok tersimpan, akan kembali ke halaman utama
        if ($detailbarang->save()) {
            return redirect()->route('detailmasuk.index')->with('success', 'Detail Barang Masuk Berhasil Ditambahkan');
        } else {
            // Jika terjadi kesalahan saat menyimpan perubahan stok, dapatkan pesan kesalahan
            $error = $detailbarang->getErrors()->all();
            return redirect()->back()->with('error', $error);
        }
    }

    public function show($idDetailMasuk)
    {
        $detailmasuk = DetailMasuk::with('detailbarang')->find($idDetailMasuk);
        $showModal = true;
        return view('petugas.detail_masuk.detail', compact('detailmasuk', 'showModal'));
    }

    public function edit($idDetailMasuk)
    {
        $detailbarang = DetailBarang::with('barang')->get();
        $trmasuk = TransaksiMasuk::all();
        $detailmasuk = DetailMasuk::find($idDetailMasuk);
        $showModal = true;
        return view('petugas.detail_masuk.edit', compact('detailbarang', 'trmasuk', 'detailmasuk', 'showModal'));
    }

    public function update(Request $request, string $idDetailMasuk)
    {
        //melakukan validasi data
        $request->validate([
            'idDetailMasuk' => 'required',
            'idTransaksiMasuk' => 'required',
            'idDetailBarang' => 'required',
            'jumlah' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        $detailMasuk = DetailMasuk::findOrFail($idDetailMasuk);

        // Simpan stok lama sebelum diubah
        $stokLama = $detailMasuk->jumlah;

        // Update detail transaksi masuk
        $detailMasuk->update($request->all());

        $detailMasuk->idDetailBarang = $request->get('idDetailBarang');

        // Update stok barang di tabel barang
        $detailbarang = DetailBarang::find($detailMasuk->idDetailBarang);
        $detailbarang->stok += ($request->jumlah - $stokLama);
        $detailbarang->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('detailmasuk.index')->with('success', 'Detail Barang Masuk Berhasil Diupdate');
    }

    public function destroy($idDetailMasuk)
    {
        DetailMasuk::find($idDetailMasuk)->delete();
        return redirect()->route('detailmasuk.index')->with('success', 'Detail Barang Masuk Berhasil Dihapus');
    }

    public function getSupplierByTransaksiMasuk(Request $request)
    {
        $idTransaksiMasuk = $request->input('idTransaksiMasuk');
        $transaksiMasuk = TransaksiMasuk::find($idTransaksiMasuk);

        if ($transaksiMasuk) {
            $idSupplier = $transaksiMasuk->idSupplier;
            return response()->json(['idSupplier' => $idSupplier]);
        }

        return response()->json(['error' => 'Invalid ID Transaksi Masuk'], 400);
    }

    public function getDetailBarangByTransaksiMasuk(Request $request)
    {
        $idTransaksiMasuk = $request->input('idTransaksiMasuk');
        $idSupplier = $request->input('idSupplier');

        $detailBarang = DetailBarang::where('idTransaksiMasuk', $idTransaksiMasuk)
            ->whereHas('barang', function ($query) use ($idSupplier) {
                $query->where('idSupplier', $idSupplier);
            })
            ->with('barang')
            ->get();

        return response()->json($detailBarang);
    }
}
