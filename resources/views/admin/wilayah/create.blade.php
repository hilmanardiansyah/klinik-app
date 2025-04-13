<x-app-layouts title="Buat Wilayah">
    <div class="card">
        <div class="card-header">
            <h4>Form Membuat Mobil</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.wilayah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Wilayah</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select name="jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="provinsi">Provinsi</option>
                        <option value="kabupaten">Kabupaten</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.wilayah.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>