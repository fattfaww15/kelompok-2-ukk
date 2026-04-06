<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $barangs = Barang::with(['supplier', 'gerai'])
            ->when($search, function ($query, $search) {
                return $query->where('nama_barang', 'like', "%{$search}%");
            })
            ->orderBy('nama_barang')
            ->get();

        $totalStock = $barangs->sum('stok');
        $totalItems = $barangs->count();
        $outOfStock = $barangs->where('stok', 0)->count();
        $lowStock = $barangs->filter(fn($item) => $item->stok > 0 && $item->stok <= 5)->count();

        return view('gudang.index', compact('barangs', 'search', 'totalStock', 'totalItems', 'outOfStock', 'lowStock'));
    }
}
