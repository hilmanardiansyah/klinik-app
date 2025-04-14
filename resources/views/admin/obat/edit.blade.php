<x-app-layouts title="Edit Obat">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Obat</h4>
        </div>
        <div class="card-body col-md-8">
            <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Obat</label>
                    <input type="text" name="nama" class="form-control" value="{{ $obat->nama }}" required>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $obat->stok }}" required>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $obat->harga }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
