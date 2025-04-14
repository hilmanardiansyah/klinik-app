<!doctype html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { margin-bottom: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Klinik</h2>

    <h4>Jumlah Kunjungan per Hari</h4>
    <table>
        <thead><tr><th>Tanggal</th><th>Total</th></tr></thead>
        <tbody>
            @foreach($kunjunganHarian as $k)
            <tr><td>{{ $k->tanggal }}</td><td>{{ $k->total }}</td></tr>
            @endforeach
        </tbody>
    </table>

    <h4>Tindakan Terbanyak</h4>
    <table>
        <thead><tr><th>Nama Tindakan</th><th>Total</th></tr></thead>
        <tbody>
            @foreach($tindakanTerbanyak as $t)
            <tr><td>{{ $t->nama }}</td><td>{{ $t->total }}</td></tr>
            @endforeach
        </tbody>
    </table>

    <h4>Obat Terbanyak</h4>
    <table>
        <thead><tr><th>Nama Obat</th><th>Total</th></tr></thead>
        <tbody>
            @foreach($obatPopuler as $o)
            <tr><td>{{ $o->nama }}</td><td>{{ $o->total }}</td></tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
