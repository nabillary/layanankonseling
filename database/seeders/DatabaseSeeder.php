<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Utama',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Suci Nurfitriyanti',
                'username' => 'guru1',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
            ],
            [
                'name' => 'Raufa',
                'username' => 'siswa1',
                'password' => Hash::make('siswa123'),
                'role' => 'siswa',
            ],
        ]);
    }
}
