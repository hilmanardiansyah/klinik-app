<x-app-layouts title="Daftar Kunjungan Hari Ini">
    <div class="card">
        <div class="d-flex justify-content-between mb-4">
            <h4 class="mb-0">Data Kunjungan</h4>
            <form action="{{ route('pendaftaran.kunjungan.index') }}" method="GET" class="form-inline d-flex">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari nama pasien...">
                <button class="btn btn-primary">Cari</button>
            </form>
        </div>
        
        <div class="card-body">
            <!-- Menampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tabel untuk menampilkan kunjungan -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Jenis Kunjungan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Perulangan untuk menampilkan data kunjungan -->
                    @forelse($kunjungans as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- Menampilkan nama pasien -->
                            <td>{{ $k->pasien->nama ?? '-' }}</td>
                            <!-- Menampilkan nama dokter -->
                            <td>{{ $k->dokter->name ?? '-' }}</td>
                            <!-- Menampilkan jenis kunjungan -->
                            <td>{{ ucfirst($k->jenis_kunjungan) }}</td>
                            <!-- Menampilkan tanggal kunjungan -->
                            <td>{{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->format('d M Y') }}</td>
                            <!-- Tombol hapus kunjungan -->
                            <td>
                                <form action="{{ route('pendaftaran.kunjungan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Hapus kunjungan ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada kunjungan hari ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $kunjungans->withQueryString()->links() }}
            </div>
            
        </div>
    </div>
</x-app-layouts>
