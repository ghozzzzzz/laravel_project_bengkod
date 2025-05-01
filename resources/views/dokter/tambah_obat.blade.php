@extends('layout.app')

@section('title','Tambah Obat')

@section('content')
<div class="container mt-4">
    <h1>Tambah Obat Baru</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            Form Tambah Obat
        </div>
        <div class="card-body">
            <form action="{{ route('obat.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>Kemasan</label>
                    <input type="text" name="kemasan" class="form-control" value="{{ old('kemasan') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection