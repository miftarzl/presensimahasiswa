<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Dosen</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f4f6fa;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
        }

        .register-card{
            width:100%;
            max-width:450px;
            background:#fff;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .logo{
            text-align:center;
            margin-bottom:10px;
        }

        .logo h1{
            color:#4f46e5;
            font-size:40px;
            font-weight:700;
        }

        .subtitle{
            text-align:center;
            color:#6b7280;
            margin-bottom:30px;
        }

        .title{
            text-align:center;
            margin-bottom:25px;
            color:#111827;
        }

        .form-group{
            margin-bottom:18px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-size:14px;
            font-weight:500;
            color:#374151;
        }

        .form-control{
            width:100%;
            height:50px;
            padding:0 15px;
            border:1px solid #d1d5db;
            border-radius:10px;
            font-size:14px;
        }

        .form-control:focus{
            outline:none;
            border-color:#4f46e5;
        }

        .btn-register{
            width:100%;
            height:50px;
            border:none;
            border-radius:10px;
            background:#4f46e5;
            color:white;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
        }

        .btn-register:hover{
            background:#4338ca;
        }

        .login-link{
            margin-top:20px;
            text-align:center;
            font-size:14px;
        }

        .login-link a{
            text-decoration:none;
            color:#4f46e5;
            font-weight:600;
        }

        .alert{
            padding:12px;
            margin-bottom:20px;
            border-radius:10px;
            background:#fee2e2;
            color:#b91c1c;
        }

        .alert-success{
    padding:12px;
    margin-bottom:20px;
    border-radius:10px;
    background:#dcfce7;
    color:#166534;
}

    </style>

</head>

<body>

<div class="register-card">

    <div class="logo">
        <h1>PRESENSI</h1>
    </div>

    <p class="subtitle">
        Sistem Presensi Online Mahasiswa
    </p>

    <h2 class="title">
        Register Dosen
    </h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @if ($errors->any())
        <div class="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('dosen.register') }}">

        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text"
            name="nama"
            class="form-control"
            value="{{ old('nama') }}"
            required>
        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="email"
           name="email"
           class="form-control"
           value="{{ old('email') }}"
           required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   required>
        </div>

        <div class="form-group">
        <label>Konfirmasi Password</label>
        <input type="password"
           name="password_confirmation"
           class="form-control"
           required>
        </div>

        <button type="submit"
                class="btn-register">
            Register
        </button>

    </form>

    <div class="login-link">
        Sudah punya akun?
        <a href="{{ route('login') }}">
            Login
        </a>
    </div>

</div>

</body>
</html>

