@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">Tambah Gerai</div>
    <div class="card-body">
        <form action="{{ route('admin.gerai.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" name="kode" value="{{ old('kode') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Gerai</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Kota</label>
                <input type="text" name="kota" value="{{ old('kota') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Gerai</button>
            <a href="{{ route('admin.gerai.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
</div>
@endsection
