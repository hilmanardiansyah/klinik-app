<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        return view('admin.pegawai.index', compact('pegawai'));
    }
    public function create()
    {
        $users = User::doesntHave('pegawai')->get();
        return view('admin.pegawai.create', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }
    public function edit(Pegawai $pegawai)
    {
        $users = User::all();
        return view('admin.pegawai.edit', compact('pegawai','users'));
    }
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        $pegawai->update($request->all());

        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai berhasil diperbaharui.');
    }
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('admin.pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
