<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\User;
use App\Models\SatuanBarang;
use App\Models\KategoriBarang;
use App\Models\Supplier;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('supplier', 'satuan', 'kategori', 'petugas')->paginate(2);
        $user = User::where('role', '=', "0")->get();
        $satuan = SatuanBarang::all();
        $kategori = KategoriBarang::all();
        $supplier = Supplier::all();

        return view('petugas.data_barang.index', compact('barangs', 'user', 'satuan', 'kategori', 'supplier'));
    }

    public function create()
    {
        $user = User::where('role', '=', "0")->get();
        $satuan = SatuanBarang::all();
        $kategori = KategoriBarang::all();
        $supplier = Supplier::all();
        return view('petugas.data_barang.create', compact('user', 'satuan', 'kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idBarang' => 'required',
            'idSupplier' => 'required',
            'idUser' => 'required',
            'idSatuan' => 'required',
            'idKategori' => 'required',
            'namaBarang' => 'required',
            'fotoProduk' => 'required|image|max:2048',
        ]);
        $imageName = time() . '.' . $request->fotoProduk->extension();
        $request->fotoProduk->move(public_path('storage'), $imageName);

        $barang = new Barang;
        $barang->idBarang = $request->get('idBarang');
        $barang->idSupplier = $request->get('idSupplier');
        $barang->idUser = $request->get('idUser');
        $barang->idSatuan = $request->get('idSatuan');
        $barang->idKategori = $request->get('idKategori');
        $barang->namaBarang = $request->get('namaBarang');
        $barang->fotoProduk = $imageName;

        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Ditambahkan');
    }

    public function show($idBarang)
    {
        $barang = Barang::find($idBarang);
        $showModal = true;
        return view('petugas.data_barang.detail', compact('barang', 'showModal'));
    }

    public function edit($idBarang)
    {
        $user = User::where('role', '=', "0")->get();
        $satuan = SatuanBarang::all();
        $kategori = KategoriBarang::all();
        $supplier = Supplier::all();
        $barang = Barang::find($idBarang);
        $showModal = true;
        return view('petugas.data_barang.edit', compact('barang', 'user', 'satuan', 'kategori', 'supplier', 'barang', 'showModal'));
    }

    public function update(Request $request, string $idBarang)
    {
        //melakukan validasi data
        $request->validate([
            'idBarang' => 'required',
            'idSupplier' => 'required',
            'idUser' => 'required',
            'idSatuan' => 'required',
            'idKategori' => 'required',
            'namaBarang' => 'required',
            'fotoProduk' => 'required|image|max:2048',
        ]);

        $barang = Barang::all()->where('idBarang', $idBarang)->first();
        $barang->idBarang = $request->get('idBarang');
        $barang->idSupplier = $request->get('idSupplier');
        $barang->idUser = $request->get('idUser');
        $barang->idSatuan = $request->get('idSatuan');
        $barang->idKategori = $request->get('idKategori');
        $barang->namaBarang = $request->get('namaBarang');
        $barang->save();

        if ($request->file('fotoProduk')) {
            // hapus foto lama jika ada foto baru yang diupload
            if ($barang->fotoProduk && file_exists(storage_path('app/public/' . $barang->fotoProduk))) {
                \Storage::delete('public/' . $barang->fotoProduk);
            }
            // simpan foto baru ke direktori penyimpanan
            $file = $request->file('fotoProduk');
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('public/fotoProduk', $nama_file);
            // simpan nama file foto ke dalam kolom 'foto' pada tabel 'mahasiswas'
            $barang->fotoProduk = $nama_file;
        }
        $image_name = $request->file('fotoProduk')->store('images', 'public');
        $barang->fotoProduk = $image_name;
        $barang->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Diupdate');
    }

    public function destroy($idBarang)
    {
        Barang::find($idBarang)->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Data Barang Berhasil Dihapus');
    }

    public function adminBarang()
    {
        $adminBarang = Barang::paginate(4);
        return view('admin.data_barang.index', compact('adminBarang'));
    }
    public function adminDetailBrg()
    {
        $adminDetailBrg = DetailBarang::with('barang')->paginate(4);
        return view('admin.detail_barang.index', compact('adminDetailBrg'));
    }
}
