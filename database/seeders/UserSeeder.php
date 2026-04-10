<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // nama, email, password, role
        $users = [
        [
            'nama' => 'Admin',
            'alamat' => 'Jl. Admin',
            'no_ktp' => '1234567890',
            'no_hp' => '08123456789',
            'no_rm' => null,
            'id_poli' => null,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ],
        [
            'nama' => 'Dokter',
            'alamat' => 'Jl. Dokter',
            'no_ktp' => '1234567891',
            'no_hp' => '08123456788',
            'no_rm' => null,
            'id_poli' => 1,
            'email' => 'dokter@gmail.com',
            'password' => Hash::make('dokter'),
            'role' => 'dokter',
        ],
        [
            'nama' => 'Pasien',
            'alamat' => 'Jl. Pasien',
            'no_ktp' => '1234567892',
            'no_hp' => '08123456787',
            'no_rm' => 'RM001',
            'id_poli' => null,
            'email' => 'pasien@gmail.com',
            'password' => Hash::make('pasien'),
            'role' => 'pasien',
        ],
    ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}