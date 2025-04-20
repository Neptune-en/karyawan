@extends('layouts.app')

@section('content')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .table-container {
        animation: fadeSlide 0.6s ease;
        border-radius: 10px;
        background: #fff;
        padding: 25px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        margin-top: 20px;
    }

    @keyframes fadeSlide {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table th {
        background-color: #f8f9fa;
    }

    .btn {
        transition: transform 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .alert {
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .btn-primary, .btn-warning, .btn-danger {
        transition: transform 0.2s ease;
    }

    .btn-primary:hover, .btn-warning:hover, .btn-danger:hover {
        transform: scale(1.05);
    }
</style>

<div class="container">
    <h3 class="mb-4">
        <i class="bi bi-trophy-fill me-2 text-primary"></i> Hasil Pemilihan Karyawan Terbaik (Metode SMART)
    </h3>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th><i class="bi bi-person-vcard me-1"></i> Peringkat</th>
                    <th><i class="bi bi-person-fill me-1"></i> Nama Karyawan</th>
                    <th><i class="bi bi-bar-chart-fill me-1"></i> Skor Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['karyawan'] }}</td>
                        <td>{{ $item['skor'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
