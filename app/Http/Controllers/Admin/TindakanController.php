<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    public function index(Request $request)
    {
            $query = Tindakan::query();
        
            if ($request->filled('search')) {
                $query->where('nama', 'like', '%' . $request->search . '%');
            }
        
            $tindakans = $query->latest()->paginate(10);
        
            return view('admin.tindakan.index', compact('tindakans'));
        
    }
    public function create()
    {
        return view('admin.tindakan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);
        Tindakan::create($request->all());
        
        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan berhasil ditambahkan.');

    }
    public function edit(Tindakan $tindakan)
    {
        return view('admin.tindakan.edit', compact('tindakan'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);

        Tindakan::update($request->all());

        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan berhasil di perbaharui.');

    }

    public function destroy(Tindakan $tindakan)
    {
        $tindakan->delete();

        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan berhasil dihapus.');
    }

}
