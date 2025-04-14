<x-app-layouts title="Daftar Wilayah">
    <!-- Pencarian Wilayah -->
   

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Wilayah</h4>
        
            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('admin.wilayah.index') }}" method="GET" class="form-inline d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari Wilayah...">
                    <button class="btn btn-primary">Cari</button>
                </form>
                <a href="{{ route('admin.wilayah.create') }}" class="btn btn-success btn-sm ml-2">+ Tambah</a>
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
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayahs as $w)
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
