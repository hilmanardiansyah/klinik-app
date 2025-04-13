<x-app-layouts title="Daftar Tindakan">
    <!-- Pencarian Tindakan -->
    <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('admin.tindakan.index') }}" method="GET" class="form-inline">
       {{-- <input type="text" name="search_plate" class="form-control mr-4 col-md" placeholder="Cari Plate Nomer.."> --}}
        <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
    </form>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Tindakan</h4>
            <a href="{{ route('admin.tindakan.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Tindakan
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
                        <th>Nama Tindakan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tindakans as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->nama }}</td>
                        <td>Rp {{ number_format($t->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.tindakan.edit', $t->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.tindakan.destroy', $t->id) }}" method="POST" style="display:inline;">
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
