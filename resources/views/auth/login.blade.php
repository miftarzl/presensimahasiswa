<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Presensi</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body{
            background:#f4f6fb;
        }

        .login-wrapper{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width:500px;
            background:#fff;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
            overflow:hidden;
        }

        .login-header{
            padding:35px;
        }

        .login-title{
            text-align:center;
            font-weight:700;
            color:#27336a;
        }

        .login-subtitle{
            text-align:center;
            color:#666;
            margin-bottom:25px;
        }

        .role-box{
            display:flex;
            border:1px solid #ddd;
            border-radius:8px;
            overflow:hidden;
            margin-bottom:25px;
        }

        .role-box label{
            flex:1;
            text-align:center;
            padding:12px;
            cursor:pointer;
            margin:0;
            background:#fafafa;
        }

        .register-section{
            background:#f7f7f7;
            padding:20px;
            text-align:center;
        }

        .footer-link{
            text-align:center;
            padding:15px;
            font-size:14px;
        }

        .btn-login{
            background:#4f46e5;
            border:none;
            color:#fff;
        }

        .btn-register{
            background:#9a8d50;
            border:none;
            color:#fff;
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-header">

            <h2 class="login-title">
                Sign in to Your Account
            </h2>

            <p class="login-subtitle">
                Presensi Online Mahasiswa
            </p>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))

            <div class="alert alert-success">

            {{ session('success') }}

            </div>

            @endif

            <form action="{{ route('login.process') }}"
                  method="POST">

                @csrf

                <div class="role-box">

                    <label>
                        <input type="radio"
                               name="role"
                               value="student"
                               checked>

                        MAHASISWA
                    </label>

                    <label>
                        <input type="radio"
                               name="role"
                               value="dosen">

                        DOSEN
                    </label>

                </div>

                <div class="mb-3">

                    <label>Username</label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Email Dosen / NPM Mahasiswa"
                           required>

                </div>

                <div class="mb-4">

                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-login w-100">

                    Login

                </button>

            </form>

        </div>

        <div class="register-section">

            <p>
                Khusus untuk Dosen baru yang belum memiliki akun
            </p>

            <a href="{{ route('dosen.register.form') }}"
               class="btn btn-register w-100">

                Registrasi Dosen Baru

            </a>

        </div>

        <div class="footer-link">

    <small style="display:block;color:#6c757d;margin-bottom:8px;">
        Fitur ini hanya tersedia untuk akun dosen.
    </small>

    <a href="{{ route('password.request') }}"
       class="text-decoration-none fw-bold"
       style="color:#198754;">

        <i class="fa-solid fa-key"></i>
        Reset Password Dosen

    </a>

</div>

    </div>

</div>

</body>
</html>