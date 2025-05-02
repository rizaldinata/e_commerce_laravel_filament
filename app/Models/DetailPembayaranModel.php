<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPembayaranModel extends Model
{
    use HasFactory;

    protected $table = 'detail_pembayaran';
    protected $guarded = [];

    public function pembayaran()
    {
        return $this->belongsTo(PembayaranModel::class, 'id_pembayaran', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id');
    }
}