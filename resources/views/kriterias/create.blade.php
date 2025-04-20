@extends('layouts.app')

@section('content')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container">
    <div class="card shadow-sm animate__animated animate__fadeIn">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-funnel-fill me-2"></i>
            <h5 class="mb-0">Tambah Kriteria</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kriterias.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-tag-fill me-1 text-primary"></i>Nama Kriteria
                    </label>
                    <input type="text" name="nama_kriteria" class="form-control" placeholder="Contoh: Pengalaman" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-percent me-1 text-success"></i>Bobot (0 - 1)
                    </label>
                    <input type="number" step="0.01" name="bobot" class="form-control" placeholder="Contoh: 0.25" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-sliders me-1 text-warning"></i>Sifat
                    </label>
                    <select name="sifat" class="form-select" required>
                        <option value="">-- Pilih Sifat --</option>
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('kriterias.index') }}" class="btn btn-secondary me-2 rounded-pill">
                        <i class="bi bi-arrow-left-circle me-1"></i> Batal
                    </a>
                    <button class="btn btn-success rounded-pill">
                        <i class="bi bi-save2-fill me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
