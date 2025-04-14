<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_hp', 'wilayah_id'
    ];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(\App\Models\Wilayah::class);
    }
}
