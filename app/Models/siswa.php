<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'password',
        'foto',
    ];

    protected $hidden = [
        'password',
    ];
}
