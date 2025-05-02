<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPembayaranModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPembayaranModel::create([
            'id_pembayaran' => 1, 
            'id_produk' => 1, 
            'jumlah_barang' => 2,
            'total_harga_per_barang' => 100000,
        ]);

        DetailPembayaranModel::create([
            'id_pembayaran' => 2, 
            'id_produk' => 2, 
            'jumlah_barang' => 1,
            'total_harga_per_barang' => 200000,
        ]);
    }
}