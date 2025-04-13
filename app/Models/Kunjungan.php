<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'tanggal_kunjungan', 'jenis_kunjungan'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
