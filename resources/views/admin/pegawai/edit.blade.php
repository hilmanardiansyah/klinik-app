<x-app-layouts title="Edit Pegawai">
    <div class="card">
        <div class="card-header">
            <h4>From Edit Pegawai</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.pegawai.update', $pegawai->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan }}" required>
                </div>
                <div class="form-group">
                    <label>Pilih User</label>
                    <select name="user_id" class="form-control" required>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}" {{ $pegawai->user_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>