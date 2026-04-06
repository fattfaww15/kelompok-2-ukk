@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Halaman Admin</h3>
    <a href="{{ route('admin.gerai.index') }}" class="btn btn-primary">Kelola Gerai</a>
</div>
<div class="row gy-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Data Barang</span>
                <a href="{{ route('admin.barang.create') }}" class="btn btn-sm btn-success">Tambah Barang</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Supplier</th>
                            <th>Gerai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangs as $barang)
                            <tr>
                                <td>{{ $barang->kode }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori }}</td>
                                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>{{ $barang->supplier?->nama ?? '-' }}</td>
                                <td>{{ $barang->gerai?->nama ?? '-' }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.barang.edit', $barang) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.barang.destroy', $barang) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Data Supplier</span>
                <a href="{{ route('admin.supplier.create') }}" class="btn btn-sm btn-success">Tambah Supplier</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->kode }}</td>
                                <td>{{ $supplier->nama }}</td>
                                <td>{{ $supplier->alamat }}</td>
                                <td>{{ $supplier->kota }}</td>
                                <td>{{ $supplier->telepon }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.supplier.edit', $supplier) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.supplier.destroy', $supplier) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus supplier ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada supplier.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
