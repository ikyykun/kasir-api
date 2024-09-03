<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    protected $table = 'pesanan_detail';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'pesanan_id',
        'barang_id',
        'jumlah',
        'subtotal',
    ];

    // Relasi dengan model Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
