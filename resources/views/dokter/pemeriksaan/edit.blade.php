<x-app-layouts title="Form Pemeriksaan">
    <div class="card">
        <div class="card-header"><h4>Pemeriksaan Pasien: {{ $kunjungan->pasien->nama }}</h4></div>
        <div class="card-body col-md-8">
            <form action="{{ route('dokter.pemeriksaan.update', $kunjungan->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="form-group">
                    <label>Diagnosis</label>
                    <textarea name="diagnosis" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>Tindakan</label>
                    @foreach ($tindakans as $t)
                        <div class="form-check">
                            <input type="checkbox" name="tindakans[]" value="{{ $t->id }}" class="form-check-input" id="t{{ $t->id }}">
                            <label class="form-check-label" for="t{{ $t->id }}">{{ $t->nama }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Obat</label>
                    @foreach ($obats as $o)
                        <div class="form-check">
                            <input type="checkbox" name="obats[]" value="{{ $o->id }}" class="form-check-input" id="o{{ $o->id }}">
                            <label class="form-check-label" for="o{{ $o->id }}">{{ $o->nama }}</label>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-success">Simpan Pemeriksaan</button>
                <a href="{{ route('dokter.pemeriksaan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
