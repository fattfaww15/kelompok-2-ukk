@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Gerai</span>
        <a href="{{ route('admin.gerai.create') }}" class="btn btn-sm btn-success">Tambah Gerai</a>
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
                @forelse($gerais as $gerai)
                    <tr>
                        <td>{{ $gerai->kode }}</td>
                        <td>{{ $gerai->nama }}</td>
                        <td>{{ $gerai->alamat }}</td>
                        <td>{{ $gerai->kota }}</td>
                        <td>{{ $gerai->telepon }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('admin.gerai.edit', $gerai) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.gerai.destroy', $gerai) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus gerai ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada gerai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
