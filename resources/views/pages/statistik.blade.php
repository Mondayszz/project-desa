 @extends('layouts.app')
@section('content')
<div class="statistik-section bg-light py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <h1 class="display-4 fw-bold text-primary mb-4">Statistik Penduduk Desa Pinaesaan</h1>
                <p class="lead text-muted fs-5">Data demografis dan populasi Desa Pinaesaan</p>
                <hr class="w-25 mx-auto border-primary border-3 opacity-75">
            </div>
        </div>

        <!-- Jumlah Penduduk -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4 text-center">
                        <h2 class="display-1 fw-bold text-primary mb-2">{{ number_format($data['jumlah_penduduk']) }}</h2>
                        <h4 class="text-muted">Total Penduduk</h4>
                        <p class="text-muted mb-0">Jiwa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row 1 -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-header bg-primary text-white border-0 rounded-top-4">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="fas fa-venus-mars me-2"></i>Jenis Kelamin
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <canvas id="chartGender" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-header bg-success text-white border-0 rounded-top-4">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="fas fa-briefcase me-2"></i>Pekerjaan
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <canvas id="chartWork" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row 2 -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-header bg-info text-white border-0 rounded-top-4">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="fas fa-birthday-cake me-2"></i>Kelompok Umur
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <canvas id="chartAge" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-header bg-warning text-white border-0 rounded-top-4">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="fas fa-users me-2"></i>Populasi per Dusun
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-center fw-bold mb-3">Jaga 1</h6>
                                <canvas id="chartDusun1" style="max-height: 200px;"></canvas>
                            </div>
                            <div class="col-6">
                                <h6 class="text-center fw-bold mb-3">Jaga 2</h6>
                                <canvas id="chartDusun2" style="max-height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Population Cards -->
        <div class="row">
            @foreach($data['populasi_dusun'] as $dusun => $populasi)
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg rounded-4 h-100">
                    <div class="card-header bg-gradient-primary text-white border-0 rounded-top-4">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="fas fa-home me-2"></i>{{ $dusun }}
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="population-card p-3 bg-light rounded-3 text-center">
                                    <i class="fas fa-mars text-primary fs-2 mb-2"></i>
                                    <h6 class="fw-bold text-primary mb-1">{{ number_format($populasi['Laki-laki'] ?? 0) }}</h6>
                                    <small class="text-muted">Laki-laki</small>
                                    <div class="percentage-badge mt-2">
                                        @php $total = array_sum($populasi); @endphp
                                        <small class="text-primary fw-bold">{{ $total > 0 ? number_format((($populasi['Laki-laki'] ?? 0) / $total) * 100, 1) : 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="population-card p-3 bg-light rounded-3 text-center">
                                    <i class="fas fa-venus text-danger fs-2 mb-2"></i>
                                    <h6 class="fw-bold text-danger mb-1">{{ number_format($populasi['Perempuan'] ?? 0) }}</h6>
                                    <small class="text-muted">Perempuan</small>
                                    <div class="percentage-badge mt-2">
                                        @php $total = array_sum($populasi); @endphp
                                        <small class="text-danger fw-bold">{{ $total > 0 ? number_format((($populasi['Perempuan'] ?? 0) / $total) * 100, 1) : 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="population-card p-3 bg-light rounded-3 text-center">
                                    <i class="fas fa-child text-success fs-2 mb-2"></i>
                                    <h6 class="fw-bold text-success mb-1">{{ number_format($populasi['Anak-anak'] ?? 0) }}</h6>
                                    <small class="text-muted">Anak-anak</small>
                                    <div class="percentage-badge mt-2">
                                        @php $total = array_sum($populasi); @endphp
                                        <small class="text-success fw-bold">{{ $total > 0 ? number_format((($populasi['Anak-anak'] ?? 0) / $total) * 100, 1) : 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="population-card p-3 bg-light rounded-3 text-center">
                                    <i class="fas fa-user-tie text-warning fs-2 mb-2"></i>
                                    <h6 class="fw-bold text-warning mb-1">{{ number_format($populasi['Kepala Keluarga'] ?? 0) }}</h6>
                                    <small class="text-muted">Kepala Keluarga</small>
                                    <div class="percentage-badge mt-2">
                                        @php $total = array_sum($populasi); @endphp
                                        <small class="text-warning fw-bold">{{ $total > 0 ? number_format((($populasi['Kepala Keluarga'] ?? 0) / $total) * 100, 1) : 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="total-population mt-4 p-3 bg-primary bg-opacity-10 rounded-3 text-center">
                            <h5 class="fw-bold text-primary mb-1">{{ number_format(array_sum($populasi)) }}</h5>
                            <small class="text-muted">Total Penduduk {{ $dusun }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.statistik-section {
    min-height: 100vh;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
}

.population-card {
    transition: all 0.3s ease;
}

.population-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }

    .card-body {
        padding: 2rem 1.5rem !important;
    }
}

@media (max-width: 576px) {
    .display-1 {
        font-size: 3rem;
    }

    .population-card {
        padding: 1.5rem 1rem !important;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Calculate percentages for gender
    const genderData = {!! json_encode(array_values($data['jenis_kelamin'])) !!};
    const genderTotal = genderData.reduce((a, b) => a + b, 0);
    const genderPercentages = genderData.map(value => ((value / genderTotal) * 100).toFixed(1));

    const chartGenderCanvas = document.getElementById('chartGender');
    if (chartGenderCanvas) {
        const chartGender = new Chart(chartGenderCanvas, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($data['jenis_kelamin'])) !!},
                datasets: [{
                    data: genderPercentages,
                    backgroundColor: ['#0d6efd', '#dc3545'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed;
                                const absolute = genderData[context.dataIndex];
                                return label + ': ' + value + '% (' + absolute + ' jiwa)';
                            }
                        }
                    }
                }
            }
        });
    } else {
        console.error('Chart canvas for gender not found');
    }

    const chartWorkCanvas = document.getElementById('chartWork');
    if (chartWorkCanvas) {
        const chartWork = new Chart(chartWorkCanvas, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($data['pekerjaan'])) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode(array_values($data['pekerjaan'])) !!},
                    backgroundColor: '#198754',
                    borderRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    const chartAgeCanvas = document.getElementById('chartAge');
    if (chartAgeCanvas) {
        const chartAge = new Chart(chartAgeCanvas, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($data['kelompok_umur'])) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode(array_values($data['kelompok_umur'])) !!},
                    borderColor: '#0dcaf0',
                    backgroundColor: 'rgba(13, 202, 240, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    // Calculate percentages for Jaga 1
    const jaga1Data = {!! json_encode(array_values($data['populasi_dusun']['Jaga 1'])) !!};
    const jaga1Total = jaga1Data.reduce((a, b) => a + b, 0);
    const jaga1Percentages = jaga1Data.map(value => ((value / jaga1Total) * 100).toFixed(1));

    // Calculate percentages for Jaga 2
    const jaga2Data = {!! json_encode(array_values($data['populasi_dusun']['Jaga 2'])) !!};
    const jaga2Total = jaga2Data.reduce((a, b) => a + b, 0);
    const jaga2Percentages = jaga2Data.map(value => ((value / jaga2Total) * 100).toFixed(1));

    // Circle charts for each dusun
    const chartDusun1Canvas = document.getElementById('chartDusun1');
    if (chartDusun1Canvas) {
        const chartDusun1 = new Chart(chartDusun1Canvas, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan', 'Anak-anak', 'Kepala Keluarga'],
                datasets: [{
                    data: jaga1Percentages,
                    backgroundColor: ['#0d6efd', '#dc3545', '#198754', '#ffc107'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 10,
                            usePointStyle: true,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed;
                                const absolute = jaga1Data[context.dataIndex];
                                return label + ': ' + value + '% (' + absolute + ' jiwa)';
                            }
                        }
                    }
                }
            }
        });
    }

    const chartDusun2Canvas = document.getElementById('chartDusun2');
    if (chartDusun2Canvas) {
        const chartDusun2 = new Chart(chartDusun2Canvas, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan', 'Anak-anak', 'Kepala Keluarga'],
                datasets: [{
                    data: jaga2Percentages,
                    backgroundColor: ['#0d6efd', '#dc3545', '#198754', '#ffc107'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 10,
                            usePointStyle: true,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed;
                                const absolute = jaga2Data[context.dataIndex];
                                return label + ': ' + value + '% (' + absolute + ' jiwa)';
                            }
                        }
                    }
                }
            }
        });
    }
});
</script>
@endsection
