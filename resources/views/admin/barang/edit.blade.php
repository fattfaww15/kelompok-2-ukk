@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">Edit Barang</div>
    <div class="card-body">
        <form action="{{ route('admin.barang.update', $barang) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" name="kode" value="{{ old('kode', $barang->kode) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="makanan" {{ old('kategori', $barang->kategori) == 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="kosmetik" {{ old('kategori', $barang->kategori) == 'kosmetik' ? 'selected' : '' }}>Kosmetik</option>
                    <option value="aksesoris" {{ old('kategori', $barang->kategori) == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}" class="form-control" min="0" step="0.01" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" class="form-control" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Supplier</label>
                <select name="supplier_id" class="form-select" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id === $barang->supplier_id ? 'selected' : '' }}>{{ $supplier->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Gerai</label>
                <select name="gerai_id" class="form-select" required>
                    @foreach($gerais as $gerai)
                        <option value="{{ $gerai->id }}" {{ $gerai->id === $barang->gerai_id ? 'selected' : '' }}>{{ $gerai->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Barang</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
</div>
@endsection
