@extends('layouts.app')
@section('content')
<div class="potensi-section bg-light">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <h1 class="display-4 fw-bold text-success mb-4">Potensi Desa Pinaesaan</h1>
                <p class="lead text-muted fs-5 mb-4">Jelajahi berbagai potensi unggulan yang membuat Desa Pinaesaan istimewa</p>
                <hr class="w-25 mx-auto border-success border-3 opacity-75">
            </div>
        </div>

        <div class="row g-5">
            @foreach($potensi as $index => $item)
            <div class="col-12 mb-5">
                <div class="potensi-item card border-0 shadow-sm bg-white rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="image-container position-relative">
                                @if($item instanceof \App\Models\Potensi)
                                    <img src="{{ asset('storage/images/' . $item->gambar) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $item->nama }}" style="min-height: 350px;">
                                @else
                                    <img src="{{ asset('images/' . $item['gambar']) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $item['nama'] }}" style="min-height: 350px;">
                                @endif
                                <div class="image-overlay d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <i class="fas fa-eye text-white fs-1 mb-2"></i>
                                        <span class="text-white fw-bold">Lihat Detail</span>
                                    </div>
                                </div>
                                <div class="category-badge">
                                    @if($item instanceof \App\Models\Potensi)
                                        @if($item->kategori == 'pertanian')
                                            <i class="fas fa-seedling text-success"></i>
                                        @elseif($item->kategori == 'peternakan')
                                            <i class="fas fa-horse text-warning"></i>
                                        @elseif($item->kategori == 'kerajinan')
                                            <i class="fas fa-palette text-primary"></i>
                                        @else
                                            <i class="fas fa-star text-secondary"></i>
                                        @endif
                                    @else
                                        @if($item['kategori'] == 'pertanian')
                                            <i class="fas fa-seedling text-success"></i>
                                        @elseif($item['kategori'] == 'peternakan')
                                            <i class="fas fa-horse text-warning"></i>
                                        @elseif($item['kategori'] == 'kerajinan')
                                            <i class="fas fa-palette text-primary"></i>
                                        @else
                                            <i class="fas fa-star text-secondary"></i>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="card-body p-5">
                                <div class="content-wrapper">
                                    @if($item instanceof \App\Models\Potensi)
                                        <h3 class="card-title fw-bold text-dark mb-4">{{ $item->nama }}</h3>
                                        <p class="card-text text-muted fs-6 mb-4 lh-base">{{ $item->deskripsi }}</p>
                                        <button class="btn btn-success-custom rounded-pill px-4 py-2 fw-bold" onclick="showPotensiDetail('{{ $item->nama }}', '{{ $item->deskripsi }}', '{{ asset('storage/images/' . $item->gambar) }}')">
                                            <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                                        </button>
                                    @else
                                        <h3 class="card-title fw-bold text-dark mb-4">{{ $item['nama'] }}</h3>
                                        <p class="card-text text-muted fs-6 mb-4 lh-base">{{ $item['deskripsi'] }}</p>
                                        <button class="btn btn-success-custom rounded-pill px-4 py-2 fw-bold" onclick="showPotensiDetail('{{ $item['nama'] }}', '{{ $item['deskripsi'] }}', '{{ asset('images/' . $item['gambar']) }}')">
                                            <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal for Potensi Detail -->
<div class="modal fade" id="potensiModal" tabindex="-1" aria-labelledby="potensiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-success text-white border-0 rounded-top-4">
                <h5 class="modal-title fw-bold" id="potensiModalLabel">Detail Potensi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalImage" src="" class="w-100 rounded-0" style="height: 350px; object-fit: cover;" alt="Potensi Image">
                <div class="p-5">
                    <h3 class="fw-bold text-success mb-4" id="modalTitle"></h3>
                    <p class="lead text-muted mb-4 fs-6" id="modalDescription"></p>
                    <div class="additional-info">
                        <h5 class="fw-bold text-success mb-4">Informasi Tambahan</h5>
                        <p class="mb-4">Untuk informasi lebih detail dan pengembangan potensi ini, silakan hubungi kantor desa atau kunjungi langsung lokasi.</p>
                        <div class="contact-grid">
                            <div class="contact-card p-4 bg-light rounded-3 me-3 mb-3">
                                <i class="fas fa-phone text-success fs-3 mb-3"></i>
                                <h6 class="fw-bold mb-1">Telepon</h6>
                                <p class="text-muted mb-0">(021) 123-4567</p>
                            </div>
                            <div class="contact-card p-4 bg-light rounded-3 mb-3">
                                <i class="fas fa-envelope text-success fs-3 mb-3"></i>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <p class="text-muted mb-0">info@desapinaesaan.id</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light rounded-bottom-4">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success-custom rounded-pill px-4">Hubungi Kami</button>
            </div>
        </div>
    </div>
</div>

<style>
.potensi-section {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 50%, #f1f3f4 100%);
}

.potensi-item {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05) !important;
}

.potensi-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

.image-container {
    position: relative;
    overflow: hidden;
}

.image-container img {
    transition: transform 0.4s ease;
}

.potensi-item:hover .image-container img {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(25, 135, 84, 0.8), rgba(40, 167, 69, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items-center;
    justify-content: center;
    cursor: pointer;
}

.potensi-item:hover .image-overlay {
    opacity: 1;
}

.category-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 50%;
    display: flex;
    align-items-center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    z-index: 2;
}

.content-wrapper {
    max-width: 500px;
}

.btn-success-custom {
    background: linear-gradient(135deg, #198754 0%, #28a745 100%);
    border: none;
    color: white;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-success-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.btn-success-custom:hover::before {
    left: 100%;
}

.btn-success-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(25, 135, 84, 0.3);
}

.contact-grid {
    display: flex;
    flex-wrap: wrap;
}

.contact-card {
    flex: 1;
    min-width: 200px;
    transition: all 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .potensi-item .row {
        flex-direction: column;
    }

    .card-body {
        padding: 3rem 2rem !important;
    }

    .content-wrapper {
        max-width: 100%;
        text-align: center;
    }

    .image-container {
        height: 300px;
    }
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }

    .card-body {
        padding: 2rem 1.5rem !important;
    }

    .image-container {
        height: 250px;
    }

    .category-badge {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}

@media (max-width: 576px) {
    .image-container {
        height: 200px;
    }

    .modal-dialog {
        margin: 1rem;
    }
}
</style>

<script>
function showPotensiDetail(title, description, imageSrc) {
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalImage').alt = title;

    const modal = new bootstrap.Modal(document.getElementById('potensiModal'));
    modal.show();
}

// Add scroll animations
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.potensi-item');

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    items.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(50px)';
        item.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(item);
    });

    // Add button click effects
    document.querySelectorAll('.btn-success-custom').forEach(btn => {
        btn.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
});
</script>
@endsection
