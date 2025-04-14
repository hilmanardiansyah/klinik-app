<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::query();
    
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        $obats = $query->latest()->paginate(10);
    
        return view('admin.obat.index', compact('obats'));
    }
    

    public function create()
    {
        return view('admin.obat.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        Obat::create($request->all());

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit(Obat $obat)
    {
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $obat->update($request->all());

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil diupdate.');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
