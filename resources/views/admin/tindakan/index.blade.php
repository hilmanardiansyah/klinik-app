<x-app-layouts title="Daftar Tindakan">
    <!-- Pencarian Tindakan -->
   

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Tindakan</h4>
        
            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('admin.tindakan.index') }}" method="GET" class="form-inline d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari Tindakan...">
                    <button class="btn btn-primary">Cari</button>
                </form>
                <a href="{{ route('admin.tindakan.create') }}" class="btn btn-success btn-sm ml-2">+ Tambah</a>
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
            {{ $tindakans->withQueryString()->links() }}

        </div>
    </div>
</x-app-layouts>
