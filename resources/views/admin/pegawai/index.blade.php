<x-app-layouts title="Daftar Pegawai">
    <!-- Pencarian Pegawai -->
    <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('admin.pegawai.index') }}" method="GET" class="form-inline">
       {{-- <input type="text" name="search_plate" class="form-control mr-4 col-md" placeholder="Cari Plate Nomer.."> --}}
        <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
    </form>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Pegawai</h4>
            <a href="{{ route('admin.pegawai.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Pegawai
            </a>
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
                    @foreach ($pegawai as $p)
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
        </div>
    </div>
</x-app-layouts>
