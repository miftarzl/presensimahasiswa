<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Riwayat Presensi</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    background:#f4f6fa;
    font-family:'Poppins',sans-serif;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:260px;
    height:100vh;
    background:linear-gradient(180deg,#4f46e5,#4338ca);
    padding:25px;
    box-sizing:border-box;
    color:white;
}

.sidebar h3{
    color:white;
    margin-bottom:20px;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    color:white;
    padding:12px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,.15);
}

.content{
    margin-left:280px;
    padding:30px;
}

.card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.riwayat-table{
    width:100%;
    border-collapse:collapse;
}

.riwayat-table thead th{
    background:#4f46e5;
    color:white;
    padding:14px;
    text-align:center;
}

.riwayat-table tbody td{
    padding:14px;
    border-bottom:1px solid #eee;
    text-align:center;
}

.riwayat-table tbody tr:hover{
    background:#f8f9ff;
}

.badge-success{
    background:#22c55e;
    color:white;
    padding:6px 12px;
    border-radius:8px;
}

.badge-warning{
    background:#f59e0b;
    color:white;
    padding:6px 12px;
    border-radius:8px;
}

.badge-info{
    background:#0ea5e9;
    color:white;
    padding:6px 12px;
    border-radius:8px;
}

.badge-danger{
    background:#ef4444;
    color:white;
    padding:6px 12px;
    border-radius:8px;
}

</style>

</head>
<body>

<div class="sidebar">

    <h3>PRESENSI</h3>

    <hr>

    <h4>{{ $student->nama }}</h4>

    <hr>

    <a href="{{ route('mahasiswa.dashboard') }}">
        <span class="material-icons">home</span>
        Dashboard
    </a>

    <a href="{{ route('mahasiswa.riwayat') }}">
        <span class="material-icons">history</span>
        Riwayat Presensi
    </a>

    <a href="{{ route('mahasiswa.password.form') }}">
        <span class="material-icons">lock</span>
        Ubah Password
    </a>

</div>

<div class="content">

    <div class="card">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        ">
            <h2 style="margin:0;">
                Riwayat Presensi
            </h2>

            <span style="
                background:#4f46e5;
                color:white;
                padding:8px 15px;
                border-radius:10px;
            ">
                Total : {{ $riwayatPresensi->count() }}
            </span>
        </div>

        <div style="overflow-x:auto;">

            <table class="riwayat-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Kode Kelas</th>
                        <th>Pertemuan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($riwayatPresensi as $index => $item)

<tr>

    <td>{{ $index + 1 }}</td>

    <td>
    {{ $item->kelas->mata_kuliah ?? '-' }}
</td>

<td>
    {{ $item->kelas->kode_kelas ?? '-' }}
</td>

<td>
    {{ $item->pertemuan }}
</td>

<td>
    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
</td>
                        <td>

@if($item->status_mahasiswa == 'hadir')

<span class="badge-success">
    Hadir
</span>

@elseif($item->status_mahasiswa == 'izin')

<span class="badge-warning">
    Izin
</span>

@elseif($item->status_mahasiswa == 'sakit')

<span class="badge-info">
    Sakit
</span>

@else

<span class="badge-danger">
    Tidak Hadir
</span>

@endif

</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6">
                            Belum ada riwayat presensi
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>