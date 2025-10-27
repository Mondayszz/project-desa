@extends('layouts.admin-content')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Edit Potensi</h1>
            <a href="{{ route('admin.potensi') }}" class="btn btn-secondary mb-3">← Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Form Edit Potensi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.potensi.update', $potensi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Potensi</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $potensi->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ $potensi->deskripsi }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="pertanian" {{ $potensi->kategori == 'pertanian' ? 'selected' : '' }}>Pertanian</option>
                                <option value="peternakan" {{ $potensi->kategori == 'peternakan' ? 'selected' : '' }}>Peternakan</option>
                                <option value="kerajinan" {{ $potensi->kategori == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                <option value="lainnya" {{ $potensi->kategori == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar</small>
                        </div>

                        @if($potensi->gambar)
                        <div class="mb-3">
                            <img src="/images/{{ $potensi->gambar }}" alt="{{ $potensi->nama }}" class="img-fluid" style="max-height: 200px;">
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
