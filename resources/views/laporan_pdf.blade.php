<!DOCTYPE html>
<html>
<head>
    <title>Laporan Presensi</title>

    <style>
        body{
            font-family: sans-serif;
            font-size: 14px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 8px;
            text-align: center;
        }

        h2{
            text-align: center;
        }

        .info{
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h2>LAPORAN DETAIL PRESENSI</h2>

    <div class="info">
        <p>
            <b>Mata Kuliah :</b>
            {{ $class->mata_kuliah }}
        </p>

        <p>
            <b>Kode Kelas :</b>
            {{ $class->kode_kelas }}
        </p>

        <p>
            <b>Total Pertemuan :</b>
            {{ $totalPertemuan }}
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
                <th>Persentase</th>
            </tr>
        </thead>

        <tbody>
            @foreach($laporan as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['npm'] }}</td>
                <td>{{ $data['hadir'] }}</td>
                <td>{{ $data['tidak_hadir'] }}</td>
                <td>{{ $data['persentase'] }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>