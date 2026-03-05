<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $data = [];
    for ($i = 1; $i <= 15; $i++) {
        $data[] = [
            'barang_id' => $i,
            'kategori_id' => ($i % 5) + 1, 
            'barang_kode' => 'BRG' . str_pad($i, 2, '0', STR_PAD_LEFT),
            'barang_nama' => 'Nama Barang ' . $i,
            'harga_beli' => 10000,
            'harga_jual' => 15000,
        ];
    }
    DB::table('m_barang')->insert($data);
}
}
