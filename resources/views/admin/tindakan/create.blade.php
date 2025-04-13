<x-app-layouts title="Buat Tindakan">
    <div class="card">
        <div class="card-header">
            <h4>Form Buat Tindakan</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.tindakan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Tindakan</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.tindakan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
