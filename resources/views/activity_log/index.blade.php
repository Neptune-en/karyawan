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

    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination li a {
        border-radius: 5px;
        padding: 8px 12px;
        background-color: #f1f1f1;
        color: #007bff;
    }

    .pagination li a:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>

<div class="container">
    <h3 class="mb-4">
        <i class="bi bi-search me-2 text-primary"></i> Riwayat Aktivitas Pengguna
    </h3>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th><i class="bi bi-person-circle me-1"></i> User</th>
                    <th><i class="bi bi-file-earmark-text me-1"></i> Aktivitas</th>
                    <th><i class="bi bi-ip me-1"></i> IP Address</th>
                    <th><i class="bi bi-browser-chrome me-1"></i> Browser</th>
                    <th><i class="bi bi-clock me-1"></i> Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->user->name ?? 'Guest' }}</td>
                        <td>{{ $log->activity }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td>{{ $log->user_agent }}</td>
                        <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        {{ $logs->links() }}
    </div>
</div>
@endsection
