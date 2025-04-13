<x-app-layouts title="Edit Tindakan">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Tindakan</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.tindakan.update', $tindakan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama Tindakan</label>
                    <input type="text" name="nama" class="form-control" value="{{ $tindakan->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $tindakan->harga }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.tindakan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
