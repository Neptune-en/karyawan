<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\NilaiKaryawan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil total data yang diperlukan
        $totalKaryawan = Karyawan::count();
        $totalKriteria = Kriteria::count();
        $totalPenilaian = NilaiKaryawan::distinct('karyawan_id')->count();

        // Data untuk grafik: total nilai per kriteria
        $kriterias = Kriteria::all();
        $labels = $kriterias->pluck('nama_kriteria'); // Ambil nama kriteria
        $data = $kriterias->map(function ($kriteria) {
            return $kriteria->nilaiKaryawans->sum('nilai'); // Hitung total nilai per kriteria
        });

        // Mengirim data ke view
        return view('dashboard.index', compact(
            'totalKaryawan', 'totalKriteria', 'totalPenilaian', 'labels', 'data'
        ));
    }
}
