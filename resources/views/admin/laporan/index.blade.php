<x-app-layouts title="Laporan Klinik">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Grafik Laporan Klinik</h4>
            <a href="{{ route('admin.laporan.export') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
        </div>
        
        <div class="card-body">
            <h5>Jumlah Kunjungan per Hari</h5>
            <canvas id="kunjunganChart" height="100"></canvas>
            <hr>

            <h5>5 Tindakan Terbanyak</h5>
            <canvas id="tindakanChart" height="100"></canvas>
            <hr>

            <h5>5 Obat Paling Sering Diresepkan</h5>
            <canvas id="obatChart" height="100"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const kunjunganChart = new Chart(document.getElementById('kunjunganChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($kunjunganHarian->pluck('tanggal')) !!},
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: {!! json_encode($kunjunganHarian->pluck('total')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            }
        });

        const tindakanChart = new Chart(document.getElementById('tindakanChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($tindakanTerbanyak->pluck('nama')) !!},
                datasets: [{
                    label: 'Total Tindakan',
                    data: {!! json_encode($tindakanTerbanyak->pluck('total')) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.7)'
                }]
            }
        });

        const obatChart = new Chart(document.getElementById('obatChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($obatPopuler->pluck('nama')) !!},
                datasets: [{
                    label: 'Total Obat Diberikan',
                    data: {!! json_encode($obatPopuler->pluck('total')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            }
        });
    </script>
</x-app-layouts>
