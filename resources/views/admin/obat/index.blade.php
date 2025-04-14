<x-app-layouts title="Daftar Obat">
    <!-- Pencarian Obat -->


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Obat</h4>
        
            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('admin.obat.index') }}" method="GET" class="form-inline d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari Obat...">
                    <button class="btn btn-primary">Cari</button>
                </form>
                <a href="{{ route('admin.obat.create') }}" class="btn btn-success btn-sm ml-2">+ Tambah</a>
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
                        <td>Rp {{ number_format($o->harga, 0, ',', '.') }}</td>
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
            {{ $obats->withQueryString()->links() }}

        </div>
    </div>
</x-app-layouts>
