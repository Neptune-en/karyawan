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

    .btn {
        transition: transform 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    table th {
        background-color: #f8f9fa;
    }
</style>

<div class="container">
    <h3 class="mb-4">📊 Input Penilaian Karyawan</h3>

    <div class="table-container">
        <form action="{{ route('penilaian.store') }}" method="POST">
            @csrf
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th><i class="bi bi-person-bounding-box me-2"></i>Karyawan</th>
                        @foreach ($kriterias as $kriteria)
                            <th><i class="bi bi-bar-chart-line me-2"></i>{{ $kriteria->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->nama }}</td>
                            @foreach ($kriterias as $kriteria)
                                <td>
                                    <input type="number" class="form-control" name="nilai[{{ $karyawan->id }}][{{ $kriteria->id }}]" min="0" max="100" step="0.01" required>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-success rounded-pill shadow-sm">
                    <i class="bi bi-save"></i> Simpan dan Hitung SMART
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
