<x-app-layouts title="Daftar Wilayah">
    <!-- Pencarian Wilayah -->
    <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('admin.wilayah.index') }}" method="GET" class="form-inline">
       {{-- <input type="text" name="search_plate" class="form-control mr-4 col-md" placeholder="Cari Plate Nomer.."> --}}
        <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
    </form>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Wilayah</h4>
            <a href="{{ route('admin.wilayah.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Wilayah
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
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $w)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $w->nama }}</td>
                        <td>{{ ucfirst($w->jenis) }}</td>
                        <td>
                            <a href="{{ route('admin.wilayah.edit', $w->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.wilayah.destroy', $w->id) }}" method="POST" style="display:inline;">
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
