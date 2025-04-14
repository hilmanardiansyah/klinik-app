<x-app-layouts title="Tambah Obat">
    <div class="card">
        <div class="card-header">
            <h4>Form Tambah Obat</h4>
        </div>
        <div class="card-body col-md-8">
            <form action="{{ route('admin.obat.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Obat</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
