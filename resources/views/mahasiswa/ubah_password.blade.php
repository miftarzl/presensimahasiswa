<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password Akun</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="authincation h-100">
    <div class="container h-100">

        <div class="row justify-content-center h-100 align-items-center">

            <div class="col-md-6">

                <div class="authincation-content">
                    <div class="auth-form">

                        <h2 class="mb-2 fw-bold">
                            Ubah Password Akun
                        </h2>

                        <p class="text-muted mb-4">
                            Silakan ubah password default Anda terlebih dahulu.
                        </p>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="alert alert-warning">
                            Password harus diganti sebelum menggunakan sistem.
                        </div>

                        <form action="{{ route('mahasiswa.password.update') }}"
                              method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Password Saat Ini
                                </label>

                                <input type="password"
                                       name="password_lama"
                                       class="form-control"
                                       placeholder="Masukkan password saat ini"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Password Baru
                                </label>

                                <input type="password"
                                       name="password_baru"
                                       class="form-control"
                                       placeholder="Minimal 8 karakter"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    Konfirmasi Password Baru
                                </label>

                                <input type="password"
                                       name="password_baru_confirmation"
                                       class="form-control"
                                       placeholder="Ulangi password baru"
                                       required>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary">
                                Ubah Password
                            </button>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>
```
