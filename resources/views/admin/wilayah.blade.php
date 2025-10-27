@extends('layouts.admin-content')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Kelola Wilayah</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if($wilayah)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Data Wilayah</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.wilayah.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Wilayah</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ $wilayah->deskripsi ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Gambar Wilayah (Opsional)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar</small>
                        </div>

                        <div class="mb-3">
                            <label for="link_gmaps" class="form-label">Link Google Maps</label>
                            <input type="url" class="form-control" id="link_gmaps" name="link_gmaps" value="{{ $wilayah->link_gmaps ?? '' }}" placeholder="https://www.google.com/maps/place/...">
                            <small class="form-text text-muted">Masukkan link Google Maps (biasa atau embed) untuk lokasi wilayah desa. Sistem akan otomatis mengkonversinya ke format embed saat ditampilkan.</small>
                        </div>

                        @if($wilayah->gambar)
                        <div class="mb-3">
                            <img src="/images/{{ $wilayah->gambar }}" alt="Wilayah" class="img-fluid" style="max-height: 300px;">
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Data wilayah belum tersedia.
    </div>
    @endif
</div>
@endsection
