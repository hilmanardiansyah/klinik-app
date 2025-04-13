<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::all();
        return view('admin.wilayah.index', compact('wilayah'));
    }

    public function create()
    {
        return view('admin.wilayah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required|in:provinsi,kabupaten',
        ]);
        Wilayah::create($request->all());

        return redirect()->route('admin.wilayah.index')->with('success', 'Data wilayah berhasil ditambahkan.');
    }

    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required|in:provinsi,kabupaten',
        ]);

        Wilayah::update($request->all());

        return redirect()->route('admin.wilayah.index')->with('success', 'Data wilayah berhasil diperbaharui.');
    }
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('admin.wilayah.index')->with('success', 'Data wilayah berhasil dihapus.');
    }
}
