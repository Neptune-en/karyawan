@extends('layouts.app')

@section('content')
<style>
    .card-stat {
        animation: zoomIn 0.6s ease;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card-stat:hover {
        transform: scale(1.05);
    }

    .card-body h5 {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card-body h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    #nilaiChart {
        animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container">
    <h3 class="mb-4">📊 Dashboard</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary card-stat">
                <div class="card-body">
                    <h5>Total Karyawan</h5>
                    <h2>{{ $totalKaryawan }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success card-stat">
                <div class="card-body">
                    <h5>Total Kriteria</h5>
                    <h2>{{ $totalKriteria }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning card-stat">
                <div class="card-body">
                    <h5>Total Penilaian</h5>
                    <h2>{{ $totalPenilaian }}</h2>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">📈 Grafik Total Nilai per Kriteria</h4>
    <canvas id="nilaiChart" height="100"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('nilaiChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Total Nilai',
                data: {!! json_encode($data) !!},
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#17a2b8',
                    '#6610f2',
                    '#e83e8c'
                ],
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 1200,
                easing: 'easeOutBounce'
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
