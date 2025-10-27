@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4 fw-bold">Wilayah Desa Pinaesaan</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Informasi Wilayah</h4>
                    <p class="text-justify">{{ $info }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            @if($gambar)
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Peta Wilayah</h4>
                    <img src="/storage/images/{{ $gambar }}" alt="Peta Wilayah Desa" class="img-fluid rounded">
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Lokasi di Peta</h4>

                    @php
                        // Ambil URL dari database
                        $link = $link_gmaps ?? '';

                        // Cek apakah itu shortlink (maps.app.goo.gl)
                        if (Str::contains($link, 'maps.app.goo.gl')) {
                            // Tampilkan pesan agar admin mengganti ke link embed
                            $embedLink = null;
                        } elseif (Str::contains($link, 'google.com/maps/embed')) {
                            // Sudah embed link
                            $embedLink = $link;
                        } else {
                            $embedLink = null;
                        }
                    @endphp

                    @if ($embedLink)
                        <iframe
                          src="{{ $embedLink }}"
                          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <div class="text-center text-muted py-5">
                            <p>⚠️ Link peta belum bisa ditampilkan.</p>
                            <p>Pastikan link yang disimpan di admin adalah <strong>link embed</strong> dari Google Maps.</p>
                            <p class="small text-secondary">
                                (Buka Google Maps → Bagikan → Sematkan peta → Salin link <code>https://www.google.com/maps/embed?pb=...</code>)
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
