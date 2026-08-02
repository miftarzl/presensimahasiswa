<!DOCTYPE html>
<html>
<head>

    <title>Presensi Online</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/style.css') }}"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h3>Presensi Online / VClass</h3>
        </div>

        <div class="card-body">

            <form
                action="{{ route('mahasiswa.presensi.online.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                <input
                type="hidden"
                name="attendance_id"
                value="{{ $attendance->id }}">

                <div class="mb-3">

                    <label>
                        Upload Bukti Kehadiran
                    </label>

                    <input
                        type="file"
                        name="bukti_foto"
                        class="form-control"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Kirim Presensi

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>