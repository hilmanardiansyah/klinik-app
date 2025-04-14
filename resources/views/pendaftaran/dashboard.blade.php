<x-app-layouts title="Dashboard Pendaftaran">
    <div class="card">
        <div class="card-header">
            <h4>Halo, {{ Auth::user()->name }}</h4>
        </div>
        <div class="card-body">
            <p>Selamat datang di halaman petugas pendaftaran. Silakan kelola data pasien dan daftar kunjungan hari ini.</p>
        </div>
    </div>
</x-app-layouts>
