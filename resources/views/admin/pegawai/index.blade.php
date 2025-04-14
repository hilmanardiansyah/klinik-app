<x-app-layouts title="Daftar Pegawai">
    <!-- Pencarian Pegawai -->
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Pegawai</h4>
            <div class="d-flex align-items-center gap-2">
            <form action="{{ route('admin.pegawai.index') }}" method="GET" class="form-inline d-flex">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari Pegawai...">
                <button class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('admin.pegawai.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Pegawai
            </a>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>{{ $p->user->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.pegawai.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pegawais->withQueryString()->links() }}

        </div>
    </div>
</x-app-layouts>
