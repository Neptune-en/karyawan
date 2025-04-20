@extends('layouts.app')

@section('content')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="page-title">
            <i class="bi bi-list-check me-2"></i> Daftar Kriteria
        </h3>
        <a href="{{ route('kriterias.create') }}" class="btn btn-success rounded-pill shadow-sm">
            <i class="bi bi-plus-circle-fill me-1"></i> Tambah Kriteria
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th><i class="bi bi-card-list me-1"></i> Nama Kriteria</th>
                        <th><i class="bi bi-bar-chart-line-fill me-1"></i> Bobot</th>
                        <th><i class="bi bi-toggles2 me-1"></i> Sifat</th>
                        <th class="text-center"><i class="bi bi-gear-fill me-1"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kriterias as $kriteria)
                        <tr>
                            <td>{{ $kriteria->nama_kriteria }}</td>
                            <td>{{ $kriteria->bobot }}</td>
                            <td>{{ ucfirst($kriteria->sifat) }}</td>
                            <td class="text-center">
                                <a href="{{ route('kriterias.edit', $kriteria->id) }}" class="btn btn-warning btn-sm rounded-pill me-1">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <form action="{{ route('kriterias.destroy', $kriteria->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm rounded-pill">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="bi bi-exclamation-circle me-2"></i> Belum ada data kriteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
