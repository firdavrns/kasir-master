<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Paidi',
                'email' => 'paidi@admin.com',
                'password' => md5('a'),
                'peran' => 1
            ],
            [
                'nama' => 'Sugeng',
                'email' => 'sugeng@petugas.com',
                'password' => md5('a'),
                'peran' => 2
            ],
        ];

        DB::table('pengguna')
            ->insert($data);
    }
}
