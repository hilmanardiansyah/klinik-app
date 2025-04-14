<x-app-layouts title="Daftar Kunjungan Hari Ini">
    <div class="card">
        <div class="card-header">
            <h4>Pasien Belum Diperiksa</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kunjungans as $k)
                        <tr>
                            <td>{{ $k->pasien->nama }}</td>
                            <td>{{ $k->jenis_kunjungan }}</td>
                            <td>{{ $k->tanggal_kunjungan }}</td>
                            <td>
                                <a href="{{ route('dokter.pemeriksaan.edit', $k->id) }}" class="btn btn-primary btn-sm">Periksa</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada kunjungan yang perlu diperiksa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
