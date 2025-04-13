<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kunjungan_id',
        'total_tagihan',
        'metode_pembayaran',
        'tanggal_bayar'
    ];
    public function kunjugan()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
