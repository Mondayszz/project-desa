@extends('layouts.admin-content')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Kelola Potensi Desa</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        @foreach($potensi as $item)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                    @if($item->gambar)
                        <img src="/images/{{ $item->gambar }}" alt="{{ $item->nama }}" class="img-fluid mb-3" style="max-height: 200px;">
                    @endif
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.potensi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.potensi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus potensi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.potensi.create') }}" class="btn btn-success">Tambah Potensi Baru</a>
        </div>
    </div>
</div>
@endsection
