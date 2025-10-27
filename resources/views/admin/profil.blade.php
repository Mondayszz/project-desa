@extends('layouts.admin-content')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Kelola Profil Desa</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if($profil)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Data Profil</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.profil.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <textarea class="form-control" id="sejarah" name="sejarah" rows="5" required>{{ $profil->sejarah ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea class="form-control" id="visi" name="visi" rows="3" required>{{ $profil->visi ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="5" required>{{ $profil->misi ?? '' }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Data profil belum tersedia.
    </div>
    @endif
</div>
@endsection
