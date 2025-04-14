<x-app-layouts title="Edit Pasien">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Pasien</h4>
        </div>
        <div class="card-body col-md-8">
            <form action="{{ route('pendaftaran.pasien.update', $pasien->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="laki-laki" {{ $pasien->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ $pasien->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pasien->tanggal_lahir }}" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $pasien->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $pasien->no_hp }}" required>
                </div>
                <div class="form-group">
                    <label>Wilayah</label>
                    <select name="wilayah_id" class="form-control" required>
                        <option value="">-- Pilih Wilayah --</option>
                        @foreach($wilayahs as $w)
                            <option value="{{ $w->id }}"
                                {{ isset($pasien) && $pasien->wilayah_id == $w->id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <button class="btn btn-primary">Update</button>
                <a href="{{ route('pendaftaran.pasien.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
