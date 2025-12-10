<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_konseling';
    protected $primaryKey = 'id_riwayat';
    public $timestamps = false;

    protected $fillable = [
        'id_konseling',
        'tanggal',
        'catatan',
        'id_guru'
    ];

    // ================================
    // RELATIONSHIP
    // ================================

    // Riwayat milik 1 konseling
    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id_konseling');
    }

    // Riwayat ditulis oleh 1 guru BK
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
