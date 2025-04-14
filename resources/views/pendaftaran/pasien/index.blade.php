<x-app-layouts title="Daftar Pasien">
    <div class="card">
        <div class="d-flex justify-content-between mb-4">
            <h4 class="mb-0">Data Pasien</h4>
            <form action="{{ route('pendaftaran.pasien.index') }}" method="GET" class="form-inline d-flex">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari pasien...">
                <button class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('pendaftaran.pasien.create') }}" class="btn btn-success btn-sm">+ Tambah Pasien</a>
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ ucfirst($p->jenis_kelamin) }}</td>
                        <td>{{ $p->tanggal_lahir }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>
                            <a href="{{ route('pendaftaran.pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pendaftaran.pasien.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $pasiens->withQueryString()->links() }}
            </div>
            
        </div>
    </div>
</x-app-layouts>
