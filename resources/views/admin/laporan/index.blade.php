<x-app-layouts title="Laporan Kunjungan">
    <div class="card">
        <div class="card-header">
            <h4>Laporan Kunjungan Pasien</h4>
        </div>
        <div class="card-body">
            <p><strong>Total Tagihan Semua Kunjungan:</strong> Rp {{ number_format($total, 0, ',', '.') }}</p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kunjungan as $k)
                    <tr>
                        <td>{{ $k->pasien->nama ?? '-' }}</td>
                        <td>{{ $k->tanggal_kunjungan }}</td>
                        <td>{{ $k->jenis_kunjungan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
