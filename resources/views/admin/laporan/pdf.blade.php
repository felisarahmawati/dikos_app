<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penghuni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #000;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
        tbody tr:nth-child(even) td {
            background-color: #f2f2f2;
        }
        tbody tr:hover td {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h2>Laporan Penghuni</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pemesanan</th>
                <th>Nama Penyewa</th>
                <th>Durasi Sewa</th>
                <th>Status Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->lama_sewa }} bulan</td>
                    <td>{{ $data->buktiPembayaran->status_konfirmasi ? 'Terkonfirmasi' : 'Belum Dikonfirmasi' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
