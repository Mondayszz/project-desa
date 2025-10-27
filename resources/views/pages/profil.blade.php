@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5 animate__animated animate__fadeInDown">Profil Desa Pinaesaan</h1>
        </div>
    </div>

    <!-- Sejarah, Visi, Misi -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="card-body">
                    <h5 class="card-title text-center">Sejarah Desa</h5>
                    <p class="card-text">{{ $sejarah }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="card-body">
                    <h5 class="card-title text-center">Visi Desa</h5>
                    <p class="card-text">{{ $visi }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="card-body">
                    <h5 class="card-title text-center">Misi Desa</h5>
                    <p class="card-text">{{ $misi }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Kependudukan -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">Data Kependudukan</h2>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-3 mb-3">
            <div class="card text-center animate__animated animate__fadeInUp animate__delay-1s">
                <div class="card-body">
                    <h3 class="text-primary">1,540</h3>
                    <p class="card-text">Total Penduduk</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center animate__animated animate__fadeInUp animate__delay-2s">
                <div class="card-body">
                    <h3 class="text-primary">800</h3>
                    <p class="card-text">Laki-laki</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center animate__animated animate__fadeInUp animate__delay-3s">
                <div class="card-body">
                    <h3 class="text-primary">740</h3>
                    <p class="card-text">Perempuan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center animate__animated animate__fadeInUp animate__delay-4s">
                <div class="card-body">
                    <h3 class="text-primary">450</h3>
                    <p class="card-text">Kepala Keluarga</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">Struktur Organisasi</h2>
        </div>
    </div>

    <div class="organizational-chart">
        @php
            $struktur = App\Models\StrukturOrganisasi::with('atasan')->get();
            $levels = [];

            // Group by hierarchy level
            foreach($struktur as $anggota) {
                $level = 0;
                $current = $anggota;
                while($current->atasan) {
                    $level++;
                    $current = $current->atasan;
                }
                $levels[$level][] = $anggota;
            }
        @endphp

        @foreach($levels as $levelIndex => $levelAnggota)
        <div class="level level-{{ $levelIndex + 1 }} animate__animated animate__fadeInUp animate__delay-{{$levelIndex + 1}}s">
            @if($levelIndex > 0)
            <div class="connector-line"></div>
            @endif
            <div class="level-members">
                @foreach($levelAnggota as $anggota)
                <div class="member-card">
                    <div class="member-photo">
                        @if($anggota->foto)
                            <img src="{{ asset('storage/images/' . $anggota->foto) }}" alt="{{ $anggota->nama }}">
                        @else
                            <div class="photo-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </div>
                    <div class="member-info">
                        <h6 class="member-name">{{ $anggota->nama }}</h6>
                        <p class="member-position">{{ $anggota->jabatan }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <!-- Lembaga Desa -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">Lembaga Desa</h2>
        </div>
    </div>

    <div class="row">
        @foreach($lembaga as $lembaga_item)
        <div class="col-md-4 mb-3">
            <div class="card animate__animated animate__fadeInUp animate__delay-{{$loop->index + 1}}s">
                <div class="card-body">
                    <h6 class="card-title">{{ $lembaga_item['nama'] }}</h6>
                    <p class="card-text">Ketua: {{ $lembaga_item['ketua'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.organizational-chart {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    padding: 40px 0;
    position: relative;
}

.level {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    width: 100%;
}

.level-members {
    display: flex;
    gap: 30px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
}

.member-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    padding: 20px;
    text-align: center;
    min-width: 200px;
    transition: all 0.3s ease;
    border: 2px solid #e9ecef;
    position: relative;
    overflow: hidden;
}

.member-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 20px 20px 0 0;
}

.member-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    border-color: #667eea;
}

.member-photo {
    width: 80px;
    height: 80px;
    margin: 0 auto 15px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #667eea;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.member-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.photo-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
}

.member-name {
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 5px;
    font-size: 1.1rem;
}

.member-position {
    color: #6c757d;
    font-size: 0.9rem;
    margin: 0;
    font-weight: 500;
}

.connector-line {
    width: 4px;
    height: 40px;
    background: linear-gradient(to bottom, #667eea, #764ba2);
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.4);
    margin-bottom: 20px;
}

/* Level-specific styling */
.level-1 .member-card {
    background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
    border-color: #667eea;
}

.level-1 .member-photo {
    border-color: #667eea;
}

.level-1 .member-card::before {
    background: linear-gradient(90deg, #667eea, #764ba2);
}

.level-2 .member-card {
    background: linear-gradient(135deg, #ffffff 0%, #f7f0ff 100%);
    border-color: #764ba2;
}

.level-2 .member-photo {
    border-color: #764ba2;
}

.level-2 .member-card::before {
    background: linear-gradient(90deg, #764ba2, #f093fb);
}

.level-3 .member-card {
    background: linear-gradient(135deg, #ffffff 0%, #fff0f9 100%);
    border-color: #f093fb;
}

.level-3 .member-photo {
    border-color: #f093fb;
}

.level-3 .member-card::before {
    background: linear-gradient(90deg, #f093fb, #f5576c);
}

/* Responsive design */
@media (max-width: 768px) {
    .level-members {
        gap: 20px;
    }

    .member-card {
        min-width: 160px;
        padding: 15px;
    }

    .member-photo {
        width: 60px;
        height: 60px;
    }

    .member-name {
        font-size: 1rem;
    }

    .member-position {
        font-size: 0.85rem;
    }
}

@media (max-width: 576px) {
    .organizational-chart {
        gap: 30px;
    }

    .level-members {
        flex-direction: column;
        gap: 15px;
    }

    .member-card {
        min-width: 100%;
        max-width: 250px;
    }

    .connector-line {
        height: 30px;
    }
}
</style>
@endsection
