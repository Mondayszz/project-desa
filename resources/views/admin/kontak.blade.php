@extends('layouts.admin-content')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Kelola Kontak</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if($kontak)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Informasi Kontak</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.kontak.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $kontak->alamat ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $kontak->telepon ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $kontak->email ?? '' }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Data kontak belum tersedia.
    </div>
    @endif
</div>
@endsection
