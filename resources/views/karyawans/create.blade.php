@extends('layouts.app')

@section('content')
<style>
    .form-card {
        animation: fadeInUp 0.6s ease-out;
        border-radius: 15px;
        padding: 40px;
        background: #ffffff;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .form-card h3 {
        font-weight: bold;
        margin-bottom: 25px;
        animation: slideInLeft 0.6s ease;
        color: #0072ff;
    }

    label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #00c6ff;
        box-shadow: 0 0 10px rgba(0, 198, 255, 0.5);
    }

    .btn {
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #0072ff;
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 114, 255, 0.3);
    }

    .btn-secondary:hover {
        transform: scale(1.05);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-card">
                <h3>Tambah Karyawan</h3>
                <form action="{{ route('karyawans.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-success">Simpan</button>
                        <a href="{{ route('karyawans.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
