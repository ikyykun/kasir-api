<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nomor_meja',
        'nama_pemesan',
        'total_harga',
        'status_pembayaran',
    ];

    // Relasi dengan model PesananDetail
    public function details()
    {
        return $this->hasMany(PesananDetail::class);
    }
}

