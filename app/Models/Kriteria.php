<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kriteria', 'bobot', 'sifat'];

    public function nilaiKaryawans()
    {
        return $this->hasMany(NilaiKaryawan::class);
    }
}
