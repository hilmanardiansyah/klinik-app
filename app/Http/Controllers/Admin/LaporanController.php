<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        // Jumlah kunjungan per hari
        $kunjunganHarian = Kunjungan::selectRaw('DATE(tanggal_kunjungan) as tanggal, COUNT(*) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Tindakan terbanyak
        $tindakanTerbanyak = DB::table('tindakan_kunjungan')
            ->join('tindakans', 'tindakans.id', '=', 'tindakan_kunjungan.tindakan_id')
            ->select('tindakans.nama', DB::raw('COUNT(*) as total'))
            ->groupBy('tindakan_kunjungan.tindakan_id', 'tindakans.nama')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Obat paling sering diresepkan
        $obatPopuler = DB::table('obat_kunjungan')
            ->join('obats', 'obats.id', '=', 'obat_kunjungan.obat_id')
            ->select('obats.nama', DB::raw('COUNT(*) as total'))
            ->groupBy('obat_kunjungan.obat_id', 'obats.nama')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('admin.laporan.index', compact('kunjunganHarian', 'tindakanTerbanyak', 'obatPopuler'));
    }
    public function exportPdf()
{
    $kunjunganHarian = Kunjungan::selectRaw('DATE(tanggal_kunjungan) as tanggal, COUNT(*) as total')
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

    $tindakanTerbanyak = DB::table('tindakan_kunjungan')
        ->join('tindakans', 'tindakans.id', '=', 'tindakan_kunjungan.tindakan_id')
        ->select('tindakans.nama', DB::raw('COUNT(*) as total'))
        ->groupBy('tindakan_kunjungan.tindakan_id', 'tindakans.nama')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

    $obatPopuler = DB::table('obat_kunjungan')
        ->join('obats', 'obats.id', '=', 'obat_kunjungan.obat_id')
        ->select('obats.nama', DB::raw('COUNT(*) as total'))
        ->groupBy('obat_kunjungan.obat_id', 'obats.nama')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

    $pdf = Pdf::loadView('admin.laporan.pdf', compact('kunjunganHarian', 'tindakanTerbanyak', 'obatPopuler'));
    return $pdf->download('laporan-klinik.pdf');
}
}
