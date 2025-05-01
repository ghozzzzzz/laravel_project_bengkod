@extends('layout.app')

@section('title', 'Detail Pemeriksaan')

@section('content')
<div class="container mt-4">
    <h3>Detail Pemeriksaan</h3>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">Informasi Pemeriksaan</div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Informasi Umum</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">Nama Pasien</th>
                            <td>{{ Auth::user()->nama }}</td>
                        </tr>
                        <tr>
                            <th>Dokter</th>
                            <td>{{ $periksa->dokter->nama ?? 'Dokter Tidak Ditemukan' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Periksa</th>
                            <td>{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->isoFormat('dddd, D MMMM Y, HH:mm') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($periksa->biaya_pemeriksaan > 0 && $periksa->catatan)
                                    <span class="badge bg-success">Sudah Diperiksa</span>
                                @else
                                    <span class="badge bg-warning text-dark">Menunggu Pemeriksaan</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Biaya</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Biaya Pemeriksaan</th>
                            <td>
                                @if ($periksa->biaya_pemeriksaan > 0)
                                    Rp {{ number_format($periksa->biaya_pemeriksaan, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            @if ($periksa->catatan)
                <div class="row mb-3">
                    <div class="col-12">
                        <h5>Catatan Dokter</h5>
                        <div class="p-3 border rounded">
                            {!! nl2br(e($periksa->catatan)) !!}
                        </div>
                    </div>
                </div>
            @endif

            @php
                // Debug - Untuk melihat struktur data lengkap di view (bisa dihapus jika sudah berjalan)
                // dd($periksa->toArray());
            @endphp

            @if ($periksa->biaya_pemeriksaan > 0)
                <div class="row">
                    <div class="col-12">
                        <h5>Obat yang Diresepkan</h5>
                        
                        @if ($periksa->detail_periksa && count($periksa->detail_periksa) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Kemasan</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalObat = 0; @endphp
                                    @foreach ($periksa->detail_periksa as $index => $detail)
                                        @php
                                            $obat = $detail->obat;
                                            $hargaObat = $obat ? $obat->harga : 0;
                                            $totalObat += $hargaObat;
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $obat ? $obat->nama_obat : 'Obat Tidak Ditemukan' }}</td>
                                            <td>{{ $obat ? $obat->kemasan : '-' }}</td>
                                            <td>Rp {{ number_format($hargaObat, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total Biaya Obat</th>
                                        <th>Rp {{ number_format($totalObat, 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> Tidak ada obat yang diresepkan dalam pemeriksaan ini.
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('pasien.periksa.create') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection