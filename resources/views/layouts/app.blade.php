<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi SMART Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahkan CSS Kustom -->
    <style>
        /* Desain Navbar */
        .navbar {
            background: linear-gradient(90deg, #00bcd4, #0072ff);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff;
        }

        .navbar .btn {
            transition: all 0.3s ease-in-out;
            border-radius: 25px;
            padding: 8px 16px;
            font-size: 14px;
        }

        .navbar .btn-outline-primary,
        .navbar .btn-outline-success,
        .navbar .btn-outline-dark {
            border: 1px solid #fff;
        }

        .navbar .btn-primary,
        .navbar .btn-success,
        .navbar .btn-dark {
            background-color: #fff;
            color: #0072ff;
        }

        .navbar .btn-outline-primary:hover,
        .navbar .btn-outline-success:hover,
        .navbar .btn-outline-dark:hover {
            background-color: #fff;
            color: #0072ff;
        }

        .navbar .btn-primary:hover,
        .navbar .btn-success:hover,
        .navbar .btn-dark:hover {
            background-color: #0072ff;
            color: #fff;
        }

        /* Styling untuk alert */
        .alert {
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Styling untuk konten utama */
        .container {
            margin-top: 40px;
            font-family: 'Arial', sans-serif;
        }

        /* Styling untuk halaman konten */
        .page-title {
            font-size: 30px;
            font-weight: bold;
            color: #0072ff;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        /* Styling untuk tombol logout */
        .btn-outline-danger {
            font-size: 14px;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
        }

        /* Responsif untuk tampilan mobile */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">SMART Karyawan</a>

            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-sm {{ request()->is('dashboard') ? 'btn-primary' : 'btn-outline-primary' }}">Dashboard</a>
                <a href="{{ url('/karyawans') }}" class="btn btn-sm {{ request()->is('karyawans*') ? 'btn-primary' : 'btn-outline-primary' }}">Karyawan</a>
                <a href="{{ url('/kriterias') }}" class="btn btn-sm {{ request()->is('kriterias*') ? 'btn-primary' : 'btn-outline-primary' }}">Kriteria</a>
                <a href="{{ url('/penilaian') }}" class="btn btn-sm {{ request()->is('penilaian*') ? 'btn-success' : 'btn-outline-success' }}">Penilaian</a>
                <a href="{{ url('/hasil-smart') }}" class="btn btn-sm {{ request()->is('hasil-smart') ? 'btn-dark' : 'btn-outline-dark' }}">Hasil SMART</a>
                <a href="{{ route('activity_log') }}" class="btn btn-sm btn-outline-secondary">Aktivitas</a>
            </div>

            <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
