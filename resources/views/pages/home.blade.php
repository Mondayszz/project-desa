@extends('layouts.app')

@section('main-bg-slideshow')
    <div class="bg-slideshow">
        <img src="{{ asset('images/bg1.jpg') }}" class="bg-slide-img active">
        <img src="{{ asset('images/bg2.jpg') }}" class="bg-slide-img">
        <div class="bg-overlay"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.bg-slide-img');
            let current = 0;
            setInterval(function() {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === current);
                });
                current = (current + 1) % slides.length;
            }, 4000); // ganti setiap 4 detik
        });
    </script>
@endsection

@section('content')
<div class="hero-section">

    <h2 class="mb-3">Selamat Datang di Web Profil</h2>
    <h1 class="mb-4">DESA PINAESAAAN</h1>
    <a href="#selengkapnya" class="btn btn-warning btn-lg px-5">SELENGKAPNYA</a>
</div>
@endsection
