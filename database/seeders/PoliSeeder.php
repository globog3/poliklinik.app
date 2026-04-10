<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('poli')->insert([
        [
            'nama_poli' => 'Poli Umum'
        ],
        [
            'nama_poli' => 'Poli Gigi'
        ]
    ]);
    }
}
