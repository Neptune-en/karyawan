<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    // Pastikan Anda sudah mendeklarasikan properti $fillable atau $guarded
    protected $fillable = ['user_id', 'activity', 'ip_address', 'user_agent'];

    // Relasi ke model User jika ada
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
