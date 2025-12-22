<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $table = 'konseling';
    protected $primaryKey = 'id_konseling';
    public $timestamps = false;

    protected $fillable = [
        'id_siswa',
        'id_guru',
        'masalah',
        'solusi',
        'tanggal',
        'status'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    // Riwayat konseling (has many)
    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'id_konseling', 'id_konseling');
    }
}
