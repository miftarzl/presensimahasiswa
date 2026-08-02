<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Daftar Mahasiswa - {{ $class->kode_kelas }}</title>

  <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" >
  <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
  <link href="{{ asset('vendor/wow-master/css/libs/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>

  <div id="main-wrapper">
    @include('header')
    @include('sidebar')

    <div class="content-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12">
            <div class="page-title flex-wrap">
              <div>
                <h4 class="mb-1">Daftar Mahasiswa</h4>
                <div class="text-muted">
                  <span class="me-3"><strong>Mata Kuliah:</strong> {{ $class->mata_kuliah }}</span>
                  <span class="me-3"><strong>Kode Kelas:</strong> {{ $class->kode_kelas }}</span>
                  <span class="me-3"><strong>Jadwal:</strong> {{ $class->jadwal }}</span>
                  <span><strong>Semester:</strong> {{ $class->semester }}</span>
                </div>
              </div>

              <div class="d-flex gap-2">
              <a href="{{ route('student') }}" class="btn btn-light">Kembali</a>
              </div>
            </div>

            @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card">
              <div class="card-body">
                <div class="table-responsive full-data">
                  <table class="table table-striped table-hover align-middle">
                    <thead>
                      <tr>
                        <th style="width: 70px;">No</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($students as $student)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $student->nama }}</td>
                          <td>{{ $student->npm }}</td>
                          <td>{{ $student->email }}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="4" class="text-center">Belum ada mahasiswa untuk kelas ini.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  <script src="{{ asset('vendor/global/global.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('vendor/wow-master/dist/wow.min.js') }}"></script>
  <script src="{{ asset('js/custom.min.js') }}"></script>
  <script src="{{ asset('js/dlabnav-init.js') }}"></script>
</body>
</html>

