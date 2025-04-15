<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    public function index(Request $request)
    {
        $query = Wilayah::query();

        // jika ada keyword pencarian
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis', 'like', '%' . $request->search . '%');
        }

        $wilayahs = $query->latest()->paginate(10); // paginasi biar rapi

        return view('admin.wilayah.index', compact('wilayahs'));
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
    public function edit(Wilayah $wilayah)
{
    return view('admin.wilayah.edit', compact('wilayah'));
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
