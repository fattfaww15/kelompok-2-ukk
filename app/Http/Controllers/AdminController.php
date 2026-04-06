<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Gerai;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['supplier', 'gerai'])->orderByDesc('id')->get();
        $suppliers = Supplier::orderByDesc('id')->get();

        return view('admin.index', compact('barangs', 'suppliers'));
    }

    public function indexGerai()
    {
        $gerais = Gerai::orderByDesc('id')->get();
        return view('admin.gerai.index', compact('gerais'));
    }

    public function createGerai()
    {
        return view('admin.gerai.create');
    }

    public function editGerai(Gerai $gerai)
    {
        return view('admin.gerai.edit', compact('gerai'));
    }

    public function createBarang()
    {
        $suppliers = Supplier::orderByDesc('id')->get();
        $gerais = Gerai::orderByDesc('id')->get();

        return view('admin.barang.create', compact('suppliers', 'gerais'));
    }

    public function editBarang(Barang $barang)
    {
        $suppliers = Supplier::orderByDesc('id')->get();
        $gerais = Gerai::orderByDesc('id')->get();

        return view('admin.barang.edit', compact('barang', 'suppliers', 'gerais'));
    }

    public function createSupplier()
    {
        return view('admin.supplier.create');
    }

    public function editSupplier(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function storeGerai(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:50|unique:gerais,kode',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
        ]);

        Gerai::create($data);

        return redirect()->route('admin.gerai.index')->with('success', 'Gerai berhasil ditambahkan.');
    }

    public function updateGerai(Request $request, Gerai $gerai)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:50|unique:gerais,kode,' . $gerai->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
        ]);

        $gerai->update($data);

        return redirect()->route('admin.gerai.index')->with('success', 'Gerai berhasil diupdate.');
    }

    public function destroyGerai(Gerai $gerai)
    {
        $gerai->delete();

        return redirect()->route('admin.gerai.index')->with('success', 'Gerai berhasil dihapus.');
    }

    public function storeBarang(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:50|unique:barangs,kode',
            'kategori' => 'required|string|max:100',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'gerai_id' => 'required|exists:gerais,id',
        ]);

        Barang::create($data);

        return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function updateBarang(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:50|unique:barangs,kode,' . $barang->id,
            'kategori' => 'required|string|max:100',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'gerai_id' => 'required|exists:gerais,id',
        ]);

        $barang->update($data);

        return redirect()->route('admin.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroyBarang(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('admin.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function storeSupplier(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:50|unique:suppliers,kode',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
        ]);

        Supplier::create($data);

        return redirect()->route('admin.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function updateSupplier(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:50|unique:suppliers,kode,' . $supplier->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
        ]);

        $supplier->update($data);

        return redirect()->route('admin.index')->with('success', 'Supplier berhasil diupdate.');
    }

    public function destroySupplier(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('admin.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
