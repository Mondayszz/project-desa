@extends('layouts.admin-content')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-edit me-2"></i>Edit Anggota Struktur Organisasi</h2>
            <a href="{{ route('admin.struktur') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Edit Anggota</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.struktur.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}" required>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="atasan_id" class="form-label">Atasan (Opsional)</label>
                        <select class="form-select @error('atasan_id') is-invalid @enderror" id="atasan_id" name="atasan_id">
                            <option value="">Pilih Atasan</option>
                            @foreach($struktur as $atasan)
                                <option value="{{ $atasan->id }}" {{ old('atasan_id', $anggota->atasan_id) == $atasan->id ? 'selected' : '' }}>
                                    {{ $atasan->nama }} - {{ $atasan->jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('atasan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto (Opsional)</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah foto.</div>
                        @if($anggota->foto)
                            <div class="mt-2">
                                <small class="text-muted">Foto saat ini:</small><br>
                                <img src="{{ asset('storage/images/' . $anggota->foto) }}" alt="Foto saat ini" class="img-thumbnail mt-1" style="max-width: 100px;">
                            </div>
                        @endif
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.struktur') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
