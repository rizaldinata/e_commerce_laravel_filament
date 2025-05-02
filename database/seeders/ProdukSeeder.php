<?php

namespace Database\Seeders;

use App\Models\ProdukModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdukModel::create([
            'nama_produk' => 'Produk A',
            'harga_produk' => 100000,
            'stok_produk' => 50,
            'deskripsi_produk' => 'Deskripsi Produk A',
        ]);

        ProdukModel::create([
            'nama_produk' => 'Produk B',
            'harga_produk' => 200000,
            'stok_produk' => 30,
            'deskripsi_produk' => 'Deskripsi Produk B',
        ]);

        ProdukModel::create([
            'nama_produk' => 'Produk C',
            'harga_produk' => 300000,
            'stok_produk' => 20,
            'deskripsi_produk' => 'Deskripsi Produk C',
        ]);
    }
}