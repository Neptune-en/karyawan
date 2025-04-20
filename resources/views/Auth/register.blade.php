<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahkan CSS Kustom -->
    <style>
        body {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            overflow: hidden;
        }

        .register-container {
            background-color: #fff;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
            transform: scale(0.95);
            animation: scaleIn 0.5s forwards;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 22px;
            margin-bottom: 20px;
            font-weight: bold;
            animation: fadeInText 1s ease-out;
        }

        .alert {
            margin-bottom: 15px;
            font-size: 13px;
            text-align: center;
        }

        .form-control {
            border-radius: 20px;
            padding: 10px 15px;
            margin-bottom: 15px;
            box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #00c6ff;
            box-shadow: 0 0 8px rgba(0, 198, 255, 0.7);
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 20px;
            background-color: #00c6ff;
            border: none;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0072ff;
        }

        .mt-3 a {
            text-align: center;
            display: block;
            color: #00c6ff;
            font-size: 13px;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .mt-3 a:hover {
            color: #0072ff;
        }

        @keyframes fadeInText {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            0% {
                opacity: 0;
                transform: scale(0.7);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun</h2>

        <!-- Menampilkan pesan error jika ada -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>

        <div class="mt-3">
            <a href="{{ route('login') }}">Sudah punya akun? Login disini.</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
