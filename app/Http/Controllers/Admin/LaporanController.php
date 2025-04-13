<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pembayaran;

class LaporanController extends Controller
{
    public function index()
    {
        $kunjungan = Kunjungan::with('pasien')->get();
        $total = Pembayaran::sum('total_tagihan');

        return view('admin.laporan.index', compact('kunjungan', 'total'));
    }
}
