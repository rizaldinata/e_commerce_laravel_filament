<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembayaranModel extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $guarded = [];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }

    public function detailPembayaran()
    {
        return $this->hasMany(DetailPembayaranModel::class, 'id_pembayaran', 'id');
    }
}