<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Dashboard Mahasiswa</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>

        body{
            background:#F4F6FA;
            margin:0;
            font-family:'Poppins',sans-serif;
        }

        .sidebar-mhs{
            position:fixed;
            left:0;
            top:0;
            width:260px;
            height:100vh;
            background:linear-gradient(
                180deg,
                #4f46e5,
                #4338ca
            );
            color:white;
            padding:25px;
            box-sizing:border-box;
        }

        .sidebar-mhs h3{
            color:white;
            margin-bottom:20px;
        }

        .sidebar-mhs h5{
            color:white;
            margin-bottom:5px;
        }

        .sidebar-mhs small{
            color:#dbeafe;
        }

        .sidebar-mhs a{
            display:flex;
            align-items:center;
            gap:10px;
            color:white;
            text-decoration:none;
            padding:12px;
            border-radius:12px;
            margin-bottom:10px;
            transition:.3s;
        }

        .sidebar-mhs a:hover{
            background:rgba(255,255,255,.15);
        }

        .logout-btn{
            width:100%;
            text-align:left;
            background:none;
            border:none;
            color:white;
            padding:12px;
            border-radius:12px;
        }

        .logout-btn:hover{
            background:rgba(255,255,255,.15);
        }

        .main-content{
            margin-left:280px;
            padding:30px;
        }

        .welcome-card{
            background:linear-gradient(
                135deg,
                #4f46e5,
                #6366f1
            );
            color:white;
            padding:25px;
            border-radius:20px;
            margin-bottom:25px;
        }

        .welcome-card h2{
            color:white;
            margin-bottom:5px;
        }

        .card-custom{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
            margin-bottom:25px;
        }

        .btn-presensi{
            width:100%;
            border:none;
            background:#4f46e5;
            color:white;
            padding:14px;
            border-radius:12px;
            font-weight:600;
        }

        .btn-presensi:hover{
            background:#4338ca;
        }

        .badge-custom{
            background:#4f46e5;
            color:white;
            padding:8px 12px;
            border-radius:8px;
            display:inline-block;
        }

        .matkul-item{
            background:#eef2ff;
            padding:15px;
            border-radius:12px;
            margin-bottom:10px;
        }

        @media(max-width:768px){

            .sidebar-mhs{
                position:relative;
                width:100%;
                height:auto;
            }

            .main-content{
                margin-left:0;
                padding:15px;
            }

        }

        .table-matkul{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

.table-matkul thead{
    background:#4f46e5;
    color:white;
}

.table-matkul th{
    padding:14px;
    text-align:left;
}

.table-matkul td{
    padding:14px;
    border-bottom:1px solid #e5e7eb;
}

.table-matkul tbody tr:hover{
    background:#f8fafc;
}

.table-matkul tbody tr:last-child td{
    border-bottom:none;
}

    </style>

</head>

<body>

<div class="sidebar-mhs">

    <h3>
        PRESENSI
    </h3>

    <hr>

    <h5>
        {{ $student->nama }}
    </h5>

    <small>
        Mahasiswa
    </small>

    <hr>

    <a href="{{ route('mahasiswa.dashboard') }}">
        <span class="material-icons">
            home
        </span>
        Dashboard
    </a>

    <a href="{{ route('mahasiswa.riwayat') }}">
        <span class="material-icons">
            history
        </span>
        Riwayat Presensi
    </a>

    <a href="{{ route('mahasiswa.password.form') }}">
        <span class="material-icons">
            lock
        </span>
        Ubah Password
    </a>

    <form action="{{ route('mahasiswa.logout') }}"
          method="POST">

        @csrf

        <button type="submit"
                class="logout-btn">

            <span class="material-icons"
                  style="vertical-align:middle;">
                logout
            </span>

            Logout

        </button>

    </form>

</div>

<div class="main-content">

    <div class="welcome-card">

        <h2>
    Halo, {{ $student->nama }} 👋
</h2>

<p>
    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
</p>

<p>
    Semoga perkuliahan hari ini berjalan lancar.
</p>

    </div>

    {{-- PRESENSI AKTIF --}}
<div class="card-custom">

    <h4 class="d-flex align-items-center" style="gap:8px;">
    <span class="material-icons">
        event
    </span>

    Presensi Hari Ini
</h4>

    <hr>

    @forelse($presensiAktif as $presensi)

        <div class="matkul-item" style="margin-bottom:20px;">

            <h3>
                {{ $presensi->kelas->mata_kuliah }}
            </h3>

            <div class="badge-custom">
                Pertemuan ke-{{ $presensi->pertemuan }}
            </div>

            <br><br>

            <p>
                <strong>Hari / Tanggal :</strong>
                {{ \Carbon\Carbon::parse($presensi->tanggal)->translatedFormat('l, d F Y') }}
            </p>

            <p>
                <strong>Jadwal :</strong>
                {{ $presensi->kelas->jadwal }}
            </p>

            <p>
                <strong>Kode Kelas :</strong>
                {{ $presensi->kelas->kode_kelas }}
            </p>

    

           @if($presensi->status_presensi == 'sudah')

<button
class="btn-presensi"
style="background:#22c55e;"
disabled>

Sudah Presensi

</button>

@elseif($presensi->status_presensi == 'belum_dibuka')

<button
class="btn-presensi"
style="background:#f59e0b;"
disabled>

Presensi Belum Dibuka

</button>

@elseif($presensi->status_presensi == 'ditutup')

<button
class="btn-presensi"
style="background:#ef4444;"
disabled>

Presensi Ditutup

</button>

@elseif($presensi->mode == 'offline')

<a href="{{ route('mahasiswa.presensi',$presensi->id) }}">
    <button class="btn-presensi">
        Mulai Presensi
    </button>
</a>

@else

<a href="{{ route('mahasiswa.presensi.online',$presensi->id) }}">
    <button class="btn-presensi">
        Upload Bukti Kehadiran
    </button>
</a>

@endif

        </div>

    @empty

<div
style="
text-align:center;
padding:50px;
">

<span
class="material-icons"
style="
font-size:70px;
color:#94a3b8;
">

event_busy

</span>

<h4
style="
margin-top:15px;
">

Tidak ada jadwal kuliah hari ini

</h4>

<p
style="
color:#64748b;
">

Silakan cek kembali sesuai jadwal perkuliahan Anda.

</p>

</div>

@endforelse

</div>

   {{-- MATA KULIAH --}}
<div class="card-custom">

    <h4>Mata Kuliah Saya</h4>

    <hr>

    <div style="overflow-x:auto;">

        <table class="table-matkul">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Kode Kelas</th>
                    <th>Semester</th>
                    <th>Jadwal</th>
                </tr>
            </thead>

            <tbody>

                @forelse($classes as $index => $kelas)

                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kelas->mata_kuliah }}</td>
                        <td>{{ $kelas->kode_kelas }}</td>
                        <td>{{ $kelas->semester }}</td>
                        <td>{{ $kelas->jadwal }}</td>
                    </tr>

                @empty

                    <div
style="
text-align:center;
padding:50px;
">

<span
class="material-icons"
style="
font-size:70px;
color:#94a3b8;
">

event_busy

</span>

<h3>

Tidak ada jadwal kuliah hari ini

</h3>

<p
style="
color:#64748b;
">

Silakan cek kembali sesuai jadwal perkuliahan Anda.

</p>

</div>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
</div>

</body>
</html>