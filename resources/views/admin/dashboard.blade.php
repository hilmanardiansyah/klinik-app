<x-app-layouts title="Dashboard Pendaftaran">
    <div class="card">
        <div class="card-header">
            <h4>Halo, {{ Auth::user()->name }}</h4>
        </div>
        <div class="card-body">
            <p>Selamat datang. Gunakan menu di samping untuk:</p>
            <ul>
              <li>Mengelola wilayah</li>
              <li>Mengelola Pegawai di KLINIK APP</li>
              <li>Mengelola Tindakan perawatan di KLINIK APP</li>
              <li>Mengelola Obat</li>
              <li>Mengelola User & Role</li>
              <li>Melihat Laporan KLINIK APP </li>
            </ul>

        </div>
    </div>
</x-app-layouts>
