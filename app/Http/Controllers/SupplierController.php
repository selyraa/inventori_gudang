<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::paginate(5);
        return view('admin.data_supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('admin.data_supplier.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idSupplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Supplier::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('supplier.index')->with('success', 'Supplier Berhasil Ditambahkan');
    }

    public function show($idSupplier)
    {
        $supplier = Supplier::find($idSupplier);
        $showModal = true;
        return view('admin.data_supplier.detail', compact('supplier', 'showModal'));
    }

    public function edit($idSupplier)
    {
        $supplier = Supplier::find($idSupplier);
        $showModal = true;
        return view('admin.data_supplier.edit', compact('supplier', 'showModal'));
    }

    public function update(Request $request, string $idSupplier)
    {
        //melakukan validasi data
        $request->validate([
            'idSupplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
        ]);
        $supplier = Supplier::all()->where('idSupplier', $idSupplier)->first();
        $supplier->idSupplier = $request->get('idSupplier');
        $supplier->nama = $request->get('nama');
        $supplier->alamat = $request->get('alamat');
        $supplier->noTelp = $request->get('noTelp');
        $supplier->save();
        return redirect()->route('supplier.index')->with('success', 'Supplier Berhasil Diupdate');
    }

    public function destroy($idSupplier)
    {
        Supplier::find($idSupplier)->delete();
        return redirect()->route('supplier.index')
            ->with('success', 'Supplier Berhasil Dihapus');
    }

    public function lapSupplier()
    {
        $supplier = Supplier::all();
        return view('admin.laporan_supplier.index', compact('supplier'));
    }

    public function exportPDF()
    {
        $supplier = Supplier::all();
        $pdf = PDF::loadView('admin.laporan_supplier.export_pdf', ['supplier' => $supplier])->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
