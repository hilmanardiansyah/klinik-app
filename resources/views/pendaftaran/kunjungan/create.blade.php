<x-app-layouts title="Form Kunjungan">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Kunjungan</h4>
        </div>
        <div class="card-body col-md-8">
            <form action="{{ route('pendaftaran.kunjungan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Pasien</label>
                    <select name="pasien_id" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($pasiens as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Dokter</label>
                    <select name="dokter_id" class="form-control" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Jenis Kunjungan</label>
                    <select name="jenis_kunjungan" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="umum">Umum</option>
                        <option value="gigi">Gigi</option>
                        <option value="anak">Anak</option>
                        <option value="lansia">Lansia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan" class="form-control" required>
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('pendaftaran.kunjungan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
