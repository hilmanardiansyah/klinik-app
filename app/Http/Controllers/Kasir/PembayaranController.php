<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Kunjungan::with(['pasien', 'tindakans', 'obats'])
            ->whereNotNull('diagnosis')
            ->whereDoesntHave('pembayaran');
    
        if ($request->filled('search')) {
            $query->whereHas('pasien', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }
    
        $kunjungans = $query->latest()->paginate(10);
    
        return view('kasir.pembayaran.index', compact('kunjungans'));
    }
    

    public function show($id)
    {
        $kunjungan = Kunjungan::with(['pasien', 'tindakans', 'obats'])->findOrFail($id);

        // hitung total
        $total = $kunjungan->tindakans->sum('harga') + $kunjungan->obats->sum('harga');

        return view('kasir.pembayaran.show', compact('kunjungan', 'total'));
    }

    public function store(Request $request, $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);

        $total = $kunjungan->tindakans->sum('harga') + $kunjungan->obats->sum('harga');

        Pembayaran::create([
            'kunjungan_id' => $id,
            'total' => $total,
            'status' => 'lunas'
        ]);

        return redirect()->route('kasir.pembayaran.index')->with('success', 'Pembayaran berhasil dicatat.');
    }
}
