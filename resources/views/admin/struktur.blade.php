@extends('layouts.admin-content')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-sitemap me-2"></i>Struktur Organisasi Desa</h2>
            <a href="{{ route('admin.struktur.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Tambah Anggota
            </a>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">
    @foreach($struktur as $anggota)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                @if($anggota->foto)
                    <img src="{{ asset('storage/images/' . $anggota->foto) }}" alt="{{ $anggota->nama }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                @else
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <i class="fas fa-user fa-2x text-secondary"></i>
                    </div>
                @endif
                <h5 class="card-title">{{ $anggota->nama }}</h5>
                <p class="card-text text-muted">{{ $anggota->jabatan }}</p>
                @if($anggota->atasan)
                    <small class="text-muted">Atasan: {{ $anggota->atasan->nama }}</small>
                @endif
            </div>
            <div class="card-footer">
                <div class="btn-group w-100">
                    <a href="{{ route('admin.struktur.edit', $anggota->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.struktur.destroy', $anggota->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($struktur->isEmpty())
<div class="row">
    <div class="col-12">
        <div class="text-center py-5">
            <i class="fas fa-users fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">Belum ada data struktur organisasi</h4>
            <p class="text-muted">Tambahkan anggota struktur organisasi untuk memulai.</p>
            <a href="{{ route('admin.struktur.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Tambah Anggota Pertama
            </a>
        </div>
    </div>
</div>
@endif
@endsection
