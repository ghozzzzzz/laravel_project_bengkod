@extends('layout.app')

@section('title','Obat')

@section('content')
<div class="container mt-4">
    <h1>Manajemen Obat</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tambah Obat -->
    <div class="mb-4">
    <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
</div>

    <!-- Daftar Obat -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obats as $obat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->kemasan }}</td>
                <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
