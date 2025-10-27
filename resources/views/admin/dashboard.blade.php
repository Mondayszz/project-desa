@extends('layouts.admin-content')

@section('content')
<!-- Admin Header -->
<header class="admin-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Pinaesaan" class="me-3" style="height: 60px; width: auto; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                    <div>
                        <h1 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i>Dashboard Admin</h1>
                        <small class="text-white-50">Panel Admin - Desa Pinaesaan</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <div class="d-flex align-items-center justify-content-end">
                    <span class="me-3 text-white">
                        <i class="fas fa-user-circle me-1"></i>Selamat datang, Admin
                    </span>
                    <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-light btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Admin Navigation -->
<nav class="admin-nav">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                </a>
                <a href="{{ route('admin.statistik') }}" class="nav-link {{ request()->routeIs('admin.statistik') ? 'active' : '' }}">
                    <i class="fas fa-chart-line me-1"></i>Statistik
                </a>
                <a href="{{ route('admin.potensi') }}" class="nav-link {{ request()->routeIs('admin.potensi') ? 'active' : '' }}">
                    <i class="fas fa-leaf me-1"></i>Potensi
                </a>
                <a href="{{ route('admin.profil') }}" class="nav-link {{ request()->routeIs('admin.profil') ? 'active' : '' }}">
                    <i class="fas fa-info-circle me-1"></i>Profil
                </a>
                <a href="{{ route('admin.kontak') }}" class="nav-link {{ request()->routeIs('admin.kontak') ? 'active' : '' }}">
                    <i class="fas fa-phone me-1"></i>Kontak
                </a>
                <a href="{{ route('admin.wilayah') }}" class="nav-link {{ request()->routeIs('admin.wilayah') ? 'active' : '' }}">
                    <i class="fas fa-map me-1"></i>Wilayah
                </a>
                <a href="{{ route('admin.struktur') }}" class="nav-link {{ request()->routeIs('admin.struktur') ? 'active' : '' }}">
                    <i class="fas fa-sitemap me-1"></i>Struktur
                </a>
                <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fas fa-user me-1"></i>Profil Admin
                </a>
            </div>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Login berhasil!</strong> Selamat datang di panel admin Desa Pinaesaan.
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                <h5 class="card-title">Statistik Penduduk</h5>
                <p class="card-text flex-grow-1">Kelola data statistik penduduk desa</p>
                <a href="{{ route('admin.statistik') }}" class="btn btn-primary mt-auto">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-leaf fa-3x text-success mb-3"></i>
                <h5 class="card-title">Potensi Desa</h5>
                <p class="card-text flex-grow-1">Kelola informasi potensi desa</p>
                <a href="{{ route('admin.potensi') }}" class="btn btn-success mt-auto">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-info-circle fa-3x text-info mb-3"></i>
                <h5 class="card-title">Profil Desa</h5>
                <p class="card-text flex-grow-1">Kelola profil dan sejarah desa</p>
                <a href="{{ route('admin.profil') }}" class="btn btn-info mt-auto">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-sitemap fa-3x text-dark mb-3"></i>
                <h5 class="card-title">Struktur Organisasi</h5>
                <p class="card-text flex-grow-1">Kelola struktur organisasi desa</p>
                <a href="{{ route('admin.struktur') }}" class="btn btn-dark mt-auto">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-phone fa-3x text-warning mb-3"></i>
                <h5 class="card-title">Kontak</h5>
                <p class="card-text flex-grow-1">Kelola informasi kontak desa</p>
                <a href="{{ route('admin.kontak') }}" class="btn btn-warning mt-auto">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-map fa-3x text-secondary mb-3"></i>
                <h5 class="card-title">Wilayah</h5>
                <p class="card-text flex-grow-1">Kelola data wilayah desa</p>
                <a href="{{ route('admin.wilayah') }}" class="btn btn-secondary mt-auto">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-center h-100">
            <div class="card-body d-flex flex-column">
                <i class="fas fa-user fa-3x text-info mb-3"></i>
                <h5 class="card-title">Profil Admin</h5>
                <p class="card-text flex-grow-1">Kelola profil dan password admin</p>
                <a href="{{ route('admin.profile') }}" class="btn btn-info mt-auto">Kelola</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informasi Sistem</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Status Sistem</h6>
                        <p class="text-success"><i class="fas fa-check-circle me-1"></i>Semua sistem berjalan normal</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Terakhir Login</h6>
                        <p><i class="fas fa-clock me-1"></i>{{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i:s') : 'Belum pernah login' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
