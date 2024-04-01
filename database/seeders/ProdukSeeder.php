<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Tempe',
                'harga' => 6000,
                'stok' => 20
            ],
            [
                'nama' => 'Tahu',
                'harga' => 3500,
                'stok' => 50
            ],
            [
                'nama' => 'Telur',
                'harga' => 2000,
                'stok' => 100
            ],
            [
                'nama' => 'Buku',
                'harga' => 1500,
                'stok' => 5
            ],
        ];

        DB::table('produk')
            ->insert($data);
    }
}
