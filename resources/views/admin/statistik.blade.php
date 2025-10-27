@extends('layouts.admin-content')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Kelola Statistik Penduduk</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if($statistik)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Data Statistik</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.statistik.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                            <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" value="{{ $statistik->jumlah_penduduk ?? '' }}" required>
                        </div>

                        <h6>Jenis Kelamin</h6>
                        @php
                            $jenisKelamin = $statistik->jenis_kelamin ?? ['Laki-laki' => '', 'Perempuan' => ''];
                        @endphp
                        @foreach($jenisKelamin as $key => $value)
                        <div class="mb-3">
                            <label class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                            <input type="number" class="form-control" name="jenis_kelamin[{{ $key }}]" value="{{ $value }}" required>
                        </div>
                        @endforeach

                        <h6>Pekerjaan</h6>
                        @php
                            $pekerjaan = $statistik->pekerjaan ?? ['Petani' => '', 'Nelayan' => '', 'Wiraswasta' => '', 'Pelajar' => '', 'Lainnya' => ''];
                        @endphp
                        @foreach($pekerjaan as $key => $value)
                        <div class="mb-3">
                            <label class="form-label">{{ ucfirst($key) }}</label>
                            <input type="number" class="form-control" name="pekerjaan[{{ $key }}]" value="{{ $value }}" required>
                        </div>
                        @endforeach

                        <h6>Kelompok Umur</h6>
                        @php
                            $kelompokUmur = $statistik->kelompok_umur ?? ['0-14' => '', '15-24' => '', '25-54' => '', '55+' => ''];
                        @endphp
                        @foreach($kelompokUmur as $key => $value)
                        <div class="mb-3">
                            <label class="form-label">{{ $key }}</label>
                            <input type="number" class="form-control" name="kelompok_umur[{{ $key }}]" value="{{ $value }}" required>
                        </div>
                        @endforeach

                        <h6>Populasi Dusun</h6>
                        @php
                            $populasiDusun = $statistik->populasi_dusun ?? ['Jaga 1' => ['Laki-laki' => '', 'Perempuan' => '', 'Anak-anak' => '', 'Kepala Keluarga' => ''], 'Jaga 2' => ['Laki-laki' => '', 'Perempuan' => '', 'Anak-anak' => '', 'Kepala Keluarga' => '']];
                        @endphp
                        @foreach($populasiDusun as $dusun => $kategori)
                        <h6 class="mt-3">{{ $dusun }}</h6>
                        @if(is_array($kategori))
                        @foreach($kategori as $key => $value)
                        <div class="mb-3">
                            <label class="form-label">{{ $key }}</label>
                            <input type="number" class="form-control" name="populasi_dusun[{{ $dusun }}][{{ $key }}]" value="{{ $value }}" required>
                        </div>
                        @endforeach
                        @else
                        <div class="mb-3">
                            <label class="form-label">{{ ucfirst(str_replace('_', ' ', $dusun)) }}</label>
                            <input type="number" class="form-control" name="populasi_dusun[{{ $dusun }}]" value="{{ $kategori }}" required>
                        </div>
                        @endif
                        @endforeach

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Data statistik belum tersedia.
    </div>
    @endif
</div>
@endsection
