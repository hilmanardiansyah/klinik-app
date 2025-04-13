<x-app-layouts title="Daftar Obat">
    <!-- Pencarian Obat -->
    <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('admin.obat.index') }}" method="GET" class="form-inline">
       {{-- <input type="text" name="search_plate" class="form-control mr-4 col-md" placeholder="Cari Plate Nomer.."> --}}
        <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
    </form>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Obat</h4>
            <a href="{{ route('admin.obat.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Obat
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
                        <th>Nama Obat</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obats as $o)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $o->nama }}</td>
                        <td>{{ $o->stok }}</td>
                        <td>{{ $o->user->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.obat.edit', $o->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.obat.destroy', $o->id) }}" method="POST" style="display:inline;">
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
