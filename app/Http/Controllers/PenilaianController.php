<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
{
    $karyawans = \App\Models\Karyawan::all();
    $kriterias = \App\Models\Kriteria::all();
    return view('penilaians.index', compact('karyawans', 'kriterias'));
}
public function store(Request $request)
{
    foreach ($request->nilai as $karyawan_id => $nilaiKriteria) {
        foreach ($nilaiKriteria as $kriteria_id => $nilai) {
            \App\Models\NilaiKaryawan::updateOrCreate(
                ['karyawan_id' => $karyawan_id, 'kriteria_id' => $kriteria_id],
                ['nilai' => $nilai]
            );
        }
    }

    return redirect()->route('penilaian.smart')->with('success', 'Nilai disimpan.');
}
public function hitungSmart()
{
    $karyawans = \App\Models\Karyawan::all();
    $kriterias = \App\Models\Kriteria::all();

    $nilai_maks = [];
    foreach ($kriterias as $kriteria) {
        $nilai_maks[$kriteria->id] = \App\Models\NilaiKaryawan::where('kriteria_id', $kriteria->id)->max('nilai');
    }

    $hasil = [];

    foreach ($karyawans as $karyawan) {
        $skor = 0;
        foreach ($kriterias as $kriteria) {
            $nilai = \App\Models\NilaiKaryawan::where('karyawan_id', $karyawan->id)
                        ->where('kriteria_id', $kriteria->id)->value('nilai') ?? 0;

            $normal = $nilai_maks[$kriteria->id] > 0 ? $nilai / $nilai_maks[$kriteria->id] : 0;
            $skor += $normal * $kriteria->bobot;
        }

        $hasil[] = [
            'karyawan' => $karyawan->nama,
            'skor' => round($skor, 4)
        ];
    }

    // Urutkan hasil dari skor terbesar
    usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);

    return view('penilaians.hasil', compact('hasil'));
}

}
