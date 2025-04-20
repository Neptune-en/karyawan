@extends('layouts.app')

@section('content')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .form-container {
        animation: fadeSlide 0.6s ease;
        border-radius: 10px;
        background: #fff;
        padding: 30px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        max-width: 600px;
        margin: 0 auto;
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
</style>

<div class="container">
    <div class="form-container mt-4">
        <h4 class="mb-4">
            <i class="bi bi-pencil-square me-2 text-primary"></i>Edit Kriteria
        </h4>

        <form action="{{ route('kriterias.update', $kriteria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bobot (0 - 1)</label>
                <input type="number" step="0.01" name="bobot" class="form-control" value="{{ $kriteria->bobot }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sifat</label>
                <select name="sifat" class="form-select" required>
                    <option value="benefit" {{ $kriteria->sifat == 'benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="cost" {{ $kriteria->sifat == 'cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('kriterias.index') }}" class="btn btn-secondary rounded-pill">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>
                <button type="submit" class="btn btn-success rounded-pill">
                    <i class="bi bi-check-circle"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
