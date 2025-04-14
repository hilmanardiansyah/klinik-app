<x-app-layouts title="Daftar Tagihan">
    <div class="card">
        <div class="card-header"><h4>Kunjungan Siap Dibayar</h4></div>
        <div class="card-body">
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

            <table class="table table-bordered">
                <thead>
                    <tr><th>No</th><th>Pasien</th><th>Tanggal</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($kunjungans as $k)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $k->pasien->nama }}</td>
                        <td>{{ $k->tanggal_kunjungan }}</td>
                        <td><a href="{{ route('kasir.pembayaran.show', $k->id) }}" class="btn btn-primary btn-sm">Bayar</a></td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center">Belum ada tagihan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
