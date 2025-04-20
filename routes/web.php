<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActivityLogController;

// Halaman utama, mengarahkan ke halaman karyawan
Route::get('/', fn() => redirect('/karyawans'));

// Rute untuk Karyawan dan Kriteria menggunakan resource controller
Route::resource('karyawans', KaryawanController::class)->middleware('auth');
Route::resource('kriterias', KriteriaController::class)->middleware('auth');

// Rute untuk Penilaian
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index')->middleware('auth');
Route::post('/penilaian/simpan', [PenilaianController::class, 'store'])->name('penilaian.store')->middleware('auth');
Route::get('/hasil-smart', [PenilaianController::class, 'hitungSmart'])->name('penilaian.smart')->middleware('auth');

// Rute untuk Dashboard (diperlukan autentikasi)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Rute untuk Login dan Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/aktivitas', [ActivityLogController::class, 'index'])->middleware('auth')->name('activity_log');
