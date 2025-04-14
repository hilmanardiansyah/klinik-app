<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Wilayah;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pendaftaran.pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wilayahs = Wilayah::all();
        return view('pendaftaran.pasien.create', compact('wilayahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required',
              'wilayah_id' => 'required|exists:wilayah,id'

        ]);

        Pasien::create($request->all());

        return redirect()->route('pendaftaran.pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        $wilayahs = Wilayah::all();
        return view('pendaftaran.pasien.edit', compact('pasien', 'wilayahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required',
            'wilayah_id' => 'required|exists:wilayah,id'
        ]);

        $pasien->update($request->all());

        return redirect()->route('pendaftaran.pasien.index')->with('success', 'Pasien berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pendaftaran.pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
