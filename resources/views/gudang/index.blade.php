@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title">Halaman Gudang</h3>
        <p class="text-muted">Lihat kondisi stok seluruh barang dan cari berdasarkan nama barang.</p>

        <form method="GET" action="{{ route('gudang.index') }}" class="row g-2 align-items-end mb-4">
            <div class="col-md-8">
                <label class="form-label">Cari Nama Barang</label>
                <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Ketik nama barang...">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </form>

        <div class="row text-center mb-3">
            <div class="col-md-4 mb-2">
                <div class="border rounded py-3 px-2 bg-light">
                    <div class="text-secondary">Total Barang</div>
                    <div class="fs-4 fw-bold">{{ $totalItems }}</div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="border rounded py-3 px-2 bg-light">
                    <div class="text-secondary">Total Stok</div>
                    <div class="fs-4 fw-bold">{{ $totalStock }}</div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="border rounded py-3 px-2 bg-light">
                    <div class="text-secondary">Stok Rendah /Habis</div>
                    <div class="fs-4 fw-bold">{{ $lowStock }} / {{ $outOfStock }}</div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>Kode</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Supplier</th>
                        <th>Gerai</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $barang)
                        <tr>
                            <td>{{ $barang->kode }}</td>
                            <td>{{ $barang->kategori }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->supplier?->nama ?? '-' }}</td>
                            <td>{{ $barang->gerai?->nama ?? '-' }}</td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>
                                @if($barang->stok === 0)
                                    <span class="badge bg-danger">Habis</span>
                                @elseif($barang->stok <= 5)
                                    <span class="badge bg-warning text-dark">Rendah</span>
                                @else
                                    <span class="badge bg-success">Aman</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
