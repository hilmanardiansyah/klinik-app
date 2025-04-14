<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\User;

class KunjunganController extends Controller
{
    public function index(Request $request)
    {
        $query = Kunjungan::with('pasien', 'dokter')
                    ->whereDate('tanggal_kunjungan', now());
    
        if ($request->filled('search')) {
            $query->whereHas('pasien', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }
    
        $kunjungans = $query->latest()->paginate(10);
    
        return view('pendaftaran.kunjungan.index', compact('kunjungans'));
    }
    

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = User::role('dokter')->get(); // user yang punya role dokter
        return view('pendaftaran.kunjungan.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:users,id',
            'jenis_kunjungan' => 'required',
            'tanggal_kunjungan' => 'required|date'
        ]);

        Kunjungan::create($request->only([
            'pasien_id',
            'dokter_id',
            'jenis_kunjungan',
            'tanggal_kunjungan'
        ]));

        return redirect()->route('pendaftaran.kunjungan.index')
            ->with('success', 'Kunjungan berhasil didaftarkan.');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect()->route('pendaftaran.kunjungan.index')
            ->with('success', 'Kunjungan berhasil dihapus.');
    }
}
