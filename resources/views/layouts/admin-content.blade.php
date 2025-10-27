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
        }
    </style>
</head>
<body>
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
