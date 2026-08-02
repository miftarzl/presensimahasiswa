<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi OTP</title>

    <style>
        body{
            font-family:Arial;
            background:#f5f5f5;
        }

        .container{
            width:400px;
            margin:80px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
        }

        input{
            width:100%;
            height:45px;
            margin-top:10px;
            padding-left:10px;
            font-size:18px;
        }

        button{
            width:100%;
            margin-top:20px;
            height:45px;
            border:none;
            background:#198754;
            color:white;
            border-radius:5px;
            cursor:pointer;
        }

        .error{
            color:red;
            margin-bottom:15px;
        }

        .success{
            color:green;
            margin-bottom:15px;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Verifikasi OTP</h2>

@if(session('error'))

<div class="error">

{{ session('error') }}

</div>

@endif

@if(session('success'))

<div class="success">

{{ session('success') }}

</div>

@endif

<form action="{{ route('otp.verify') }}"
method="POST">

@csrf

<label>Masukkan OTP</label>

<input
type="text"
name="otp"
maxlength="6"
required>

<button>

Verifikasi

</button>

</form>

<form
action="{{ route('otp.resend') }}"
method="POST">

@csrf

<button
style="background:#6c757d">

Kirim Ulang OTP

</button>

</form>

</div>

</body>

</html>