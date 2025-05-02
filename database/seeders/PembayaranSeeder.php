<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use App\Models\PembayaranModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        PembayaranModel::create([
            'id_pengguna' => $user->id,
            'tanggal_pembayaran' => now(),
            'total_harga' => 300000,
            'status_pembayaran' => 'menunggu',
        ]);

        $user2 = \App\Models\User::firstOrCreate([
            'email' => 'pengguna@example.com',
        ], [
            'name' => 'Pengguna User',
            'password' => bcrypt('password'),
            'role' => 'pengguna',
        ]);

        PembayaranModel::create([
            'id_pengguna' => $user2->id,
            'tanggal_pembayaran' => now(),
            'total_harga' => 200000,
            'status_pembayaran' => 'diverifikasi',
        ]);
    }
}