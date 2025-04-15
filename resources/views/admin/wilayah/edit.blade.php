<x-app-layouts title="Edit Wilayah">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Wilayah</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.wilayah.update', $wilayah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Penting untuk method PUT pada update --}}

                <div class="form-group">
                    <label for="nama">Nama Wilayah</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $wilayah->nama) }}" required>
                </div>

                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select name="jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="provinsi" {{ $wilayah->jenis == 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="kabupaten" {{ $wilayah->jenis == 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.wilayah.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
