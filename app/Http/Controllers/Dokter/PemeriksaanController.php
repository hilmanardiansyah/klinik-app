<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemeriksaanController extends Controller
{
    public function index(Request $request)
{
    $query = Kunjungan::with('pasien')
        ->where('dokter_id', auth()->id())
        ->whereDate('tanggal_kunjungan', now())
        ->whereNull('diagnosis');

    if ($request->filled('search')) {
        $query->whereHas('pasien', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    $kunjungans = $query->latest()->paginate(10);

    return view('dokter.pemeriksaan.index', compact('kunjungans'));
}


    public function edit($id)
    {
        $kunjungan = Kunjungan::with('pasien')->findOrFail($id);
        $tindakans = Tindakan::all();
        $obats = Obat::all();
        return view('dokter.pemeriksaan.edit', compact('kunjungan', 'tindakans', 'obats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'diagnosis' => 'required',
            'tindakans' => 'array|nullable',
            'obats' => 'array|nullable',
        ]);

        DB::transaction(function () use ($request, $id) {
            $kunjungan = Kunjungan::findOrFail($id);
            $kunjungan->diagnosis = $request->diagnosis;
            $kunjungan->save();

            // Simpan tindakan
            if ($request->filled('tindakans')) {
                foreach ($request->tindakans as $tindakan_id) {
                    DB::table('tindakan_kunjungan')->insert([
                        'kunjungan_id' => $kunjungan->id,
                        'tindakan_id' => $tindakan_id,
                    ]);
                }
            }

            // Simpan obat
            if ($request->filled('obats')) {
                foreach ($request->obats as $obat_id) {
                    DB::table('obat_kunjungan')->insert([
                        'kunjungan_id' => $kunjungan->id,
                        'obat_id' => $obat_id,
                    ]);
                }
            }
        });

        return redirect()->route('dokter.pemeriksaan.index')->with('success', 'Pemeriksaan berhasil disimpan.');
    }
}
