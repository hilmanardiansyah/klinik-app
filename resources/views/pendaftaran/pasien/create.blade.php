<x-app-layouts title="Tambah Pasien">
    <div class="card">
        <div class="card-header">
            <h4>Form Tambah Pasien</h4>
        </div>
        <div class="card-body col-md-8">
            <form action="{{ route('pendaftaran.pasien.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_hp" class="form-control" required>
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


                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('pendaftaran.pasien.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
