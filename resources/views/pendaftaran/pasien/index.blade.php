<x-app-layouts title="Daftar Pasien">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Pasien</h4>
            <a href="{{ route('pendaftaran.pasien.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Pasien
            </a>
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
        </div>
    </div>
</x-app-layouts>
