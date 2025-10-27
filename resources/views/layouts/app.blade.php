<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Pinaesaan</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts untuk judul dan body -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@300;400;500;600;700&family=Pacifico&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-green: #18794e;
            --secondary-green: #28a745;
            --accent-yellow: #ffd600;
            --text-white: #ffffff;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --glass-bg: rgba(24, 121, 78, 0.85);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            transition: opacity 0.5s ease-in-out;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .bg-slideshow {
            position: fixed;
            top: 0; left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .bg-slide-img {
            position: absolute;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            opacity: 0;
            transition: opacity 2s cubic-bezier(0.4, 0, 0.2, 1);
            left: 0;
            top: 0;
            transform: scale(1.1);
        }

        .bg-slide-img.active {
            opacity: 1;
            filter: brightness(0.55) contrast(1.1);
            transform: scale(1);
        }

        .bg-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(135deg, rgba(0,0,0,0.1) 0%, rgba(24,121,78,0.2) 100%);
            z-index: 1;
        }

        header, footer, main {
            position: relative;
            z-index: 2;
        }

        header {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: var(--text-white);
            padding: 0;
            box-shadow: 0 4px 20px var(--shadow-color);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.6rem;
            color: var(--text-white) !important;
            text-decoration: none;
            text-shadow: 0 2px 6px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .navbar-brand:hover {
            color: var(--accent-yellow) !important;
            transform: translateY(-2px);
        }

        .nav-link {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-white) !important;
            font-weight: 500;
            font-size: 1.1rem;
            text-shadow: 0 2px 6px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 1rem;
            letter-spacing: 0.3px;
        }

        .nav-link:hover {
            color: var(--accent-yellow) !important;
            transform: translateY(-1px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-yellow);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-white);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 214, 0, 0.25);
        }

        footer {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: var(--text-white);
            text-align: center;
            padding: 1rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 20px var(--shadow-color);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        footer p {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            font-weight: 400;
            font-size: 1rem;
            text-shadow: 0 2px 6px rgba(0,0,0,0.3);
            letter-spacing: 0.2px;
        }

        main {
            min-height: 80vh;
            padding: 4rem 0;
        }

        body.fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .hero-section {
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-section h2 {
            color: var(--accent-yellow);
            font-family: 'Pacifico', cursive;
            font-size: clamp(2rem, 5vw, 3rem);
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-section h4 {
            color: var(--text-white);
            font-family: 'Dancing Script', cursive;
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            margin-bottom: 1rem;
            animation: fadeInUp 1.2s ease-out;
        }

        .hero-section h1 {
            color: var(--text-white);
            font-size: clamp(2.5rem, 8vw, 4rem);
            letter-spacing: 2px;
            font-weight: 700;
            margin-bottom: 2rem;
            animation: fadeInUp 1.4s ease-out;
        }

        .hero-section .btn-warning {
            letter-spacing: 1px;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            background: linear-gradient(45deg, var(--accent-yellow), #ffed4e);
            border: none;
            box-shadow: 0 4px 15px rgba(255, 214, 0, 0.3);
            transition: all 0.3s ease;
            animation: fadeInUp 1.6s ease-out;
        }

        .hero-section .btn-warning:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 214, 0, 0.4);
            background: linear-gradient(45deg, #ffed4e, var(--accent-yellow));
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            header {
                padding: 0.5rem 0;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section h2 {
                font-size: 2rem;
            }

            main {
                padding: 2rem 0;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    @yield('main-bg-slideshow')

    <!-- Header / Navbar -->
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <img src="/images/logo.png" alt="Logo Desa Pinaesaan" class="me-2" style="height: 40px; width: auto;">
                Desa Pinaesaan
            </a>
            <nav>
                <a href="{{ route('profil') }}" class="nav-link d-inline-block">Profil</a>
                <a href="{{ route('statistik') }}" class="nav-link d-inline-block">Statistik</a>
                <a href="{{ route('potensi') }}" class="nav-link d-inline-block">Potensi</a>
                <a href="{{ route('wilayah') }}" class="nav-link d-inline-block">Wilayah</a>
                <a href="{{ route('kontak') }}" class="nav-link d-inline-block">Kontak</a>
                <a href="{{ route('admin.login.form') }}" class="nav-link d-inline-block">Login Admin</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 KKT 144 Desa Pinaesaan. Semua Hak Dilindungi.</p>
    </footer>

    <script>
        document.querySelectorAll('a.nav-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                if(link.hostname === window.location.hostname && link.getAttribute('href') !== '#') {
                    e.preventDefault();
                    document.body.classList.add('fade-out');
                    setTimeout(function() {
                        window.location = link.href;
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>
