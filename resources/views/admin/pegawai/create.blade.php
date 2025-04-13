<x-app-layouts title="Buat Pegawai">
    <div class="card">
        <div class="card-header">
            <h4>Form Membuat Pegawai</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.pegawai.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pilih User</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>