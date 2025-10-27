<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Desa Pinaesaan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-header {
            background: linear-gradient(135deg, #18794e 0%, #28a745 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .admin-header h1 {
            margin: 0;
            font-weight: 600;
        }

        .admin-nav {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 0.75rem 0;
        }

        .admin-nav .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }

        .admin-nav .nav-link:hover {
            background-color: #f8f9fa;
            color: #18794e;
            text-decoration: none;
        }

        .admin-nav .nav-link.active {
            background-color: #18794e;
            color: white;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background: #c82333;
            color: white;
            text-decoration: none;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            background: linear-gradient(135deg, #18794e 0%, #28a745 100%);
            color: white;
            border-radius: 0.5rem 0.5rem 0 0 !important;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #18794e 0%, #28a745 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #28a745 0%, #18794e 100%);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
            border: none;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
            border: none;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #495057 0%, #6c757d 100%);
        }
    </style>
</head>
<body>
    <!-- Admin Header -->
    <header class="admin-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Pinaesaan" class="me-3" style="height: 50px; width: auto;">
                        <div>
                            <h1 class="mb-0"><i class="fas fa-cog me-2"></i>Dashboard Admin</h1>
                            <small class="text-white-50">Admin - Desa Pinaesaan</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <small>Selamat datang, Admin Desa Pinaesaan</small>
                    <form method="POST" action="{{ route('admin.logout') }}" class="d-inline mt-2">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </button>
                    </form>
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
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0 text-muted">© 2025 KKT 144 Desa Pinaesaan - Panel Admin</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
