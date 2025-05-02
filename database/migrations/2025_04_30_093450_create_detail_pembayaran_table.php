<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembayaran');
            $table->integer('id_produk');
            $table->integer('jumlah_barang');
            $table->decimal('total_harga_per_barang', 10, 2);
            $table->timestamps();

            $table->foreign('id_pembayaran')->references('id')->on('pembayaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembayaran');
    }
};