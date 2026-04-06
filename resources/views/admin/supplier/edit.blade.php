@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">Edit Supplier</div>
    <div class="card-body">
        <form action="{{ route('admin.supplier.update', $supplier) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" name="kode" value="{{ old('kode', $supplier->kode) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Supplier</label>
                <input type="text" name="nama" value="{{ old('nama', $supplier->nama) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $supplier->alamat) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" name="kota" value="{{ old('kota', $supplier->kota) }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon', $supplier->telepon) }}" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Supplier</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
</div>
@endsection
