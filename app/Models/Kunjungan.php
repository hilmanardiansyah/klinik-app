<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'dokter_id' , 'tanggal_kunjungan', 'jenis_kunjungan', 'diagnosis'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

}
