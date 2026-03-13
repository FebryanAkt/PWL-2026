<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $data = [];
    $detail_id = 1;
    for ($i = 1; $i <= 10; $i++) { 
        for ($j = 1; $j <= 3; $j++) { 
            $data[] = [
                'detail_id' => $detail_id++,
                'penjualan_id' => $i,
                'barang_id' => rand(1, 15), 
                'harga' => 15000,
                'jumlah' => rand(1, 5),
            ];
        }
    }
    DB::table('t_penjualan_detail')->insert($data);
}
}
