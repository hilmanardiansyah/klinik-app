<x-app-layouts title="Data User">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data User</h4>
        
            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('admin.user.index') }}" method="GET" class="form-inline d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Cari user...">
                    <button class="btn btn-primary">Cari</button>
                </form>
                <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-sm ml-2">+ Tambah</a>
            </div>
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->roles->pluck('name')->join(', ') }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->withQueryString()->links() }}

        </div>
    </div>
</x-app-layouts>
