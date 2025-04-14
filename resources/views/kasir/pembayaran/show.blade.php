<x-app-layouts title="Pembayaran">
    <div class="card">
        <div class="card-header"><h4>Tagihan: {{ $kunjungan->pasien->nama }}</h4></div>
        <div class="card-body">
            <h5>Tindakan</h5>
            <ul>
                @foreach($kunjungan->tindakans as $t) <li>{{ $t->nama }} - Rp{{ number_format($t->harga) }}</li> @endforeach
            </ul>

            <h5>Obat</h5>
            <ul>
                @foreach($kunjungan->obats as $o) <li>{{ $o->nama }} - Rp{{ number_format($o->harga) }}</li> @endforeach
            </ul>

            <h4>Total: <strong>Rp{{ number_format($total) }}</strong></h4>

            <form action="{{ route('kasir.pembayaran.store', $kunjungan->id) }}" method="POST">
                @csrf
                <button class="btn btn-success">Bayar Sekarang</button>
                <a href="{{ route('kasir.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
