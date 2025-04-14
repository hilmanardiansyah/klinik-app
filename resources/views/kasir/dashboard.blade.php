<x-app-layouts title="Dashboard Pendaftaran">
    <div class="card">
        <div class="card-header">
            <h4>Halo, {{ Auth::user()->name }}</h4>
        </div>
        <div class="card-body">
            <p>Selamat datang. Gunakan menu di samping untuk:</p>
            <ul>
              <li>Melihat kunjungan yang sudah selesai</li>
              <li>Menghitung otomatis dari tindakan dan obat</li>
            </ul>

        </div>
    </div>
</x-app-layouts>
