<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>

        body{
            background:#eef2f7;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card-reset{
            width:100%;
            max-width:480px;
            border:none;
            border-radius:20px;
            box-shadow:0 15px 35px rgba(0,0,0,.08);
            overflow:hidden;
        }

        .card-header{
            background:#198754;
            padding:40px;
            text-align:center;
            border:none;
        }

        .card-header i{
            width:80px;
            height:80px;
            line-height:80px;
            border-radius:50%;
            background:white;
            color:#198754;
            font-size:35px;
        }

        .card-body{
            padding:35px;
        }

        h3{
            font-weight:700;
            color:#2c3e50;
        }

        p{
            color:#777;
        }

        .form-control{
            height:50px;
            border-radius:12px;
        }

        .input-group-text{
            background:white;
            cursor:pointer;
        }

        .btn-reset{
            height:50px;
            border-radius:12px;
            font-weight:600;
            font-size:16px;
        }

    </style>

</head>

<body>

<div class="card card-reset">

    <div class="card-header">

        <i class="fa-solid fa-lock"></i>

    </div>

    <div class="card-body">

        <h3 class="text-center">
            Atur Ulang Password
        </h3>

        <p class="text-center mb-4">
            Masukkan email dan password baru Anda
        </p>

        @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

        @endif

        <form action="{{ route('password.email') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Email

                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>

                       @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="mb-3">

                <label class="form-label">

                    Password Baru

                </label>

                <div class="input-group">

                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control"
                           required>

                    <span class="input-group-text"
                          onclick="toggle('password',this)">

                        <i class="fa-solid fa-eye"></i>

                    </span>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Konfirmasi Password

                </label>

                <div class="input-group">

                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="form-control"
                           required>

                    <span class="input-group-text"
                          onclick="toggle('password_confirmation',this)">

                        <i class="fa-solid fa-eye"></i>

                    </span>

                </div>

            </div>

            <div class="mb-3">

    <small id="passwordInfo" class="text-danger">

        <i class="fa-solid fa-circle-xmark"></i>

        Password minimal 8 karakter

    </small>

</div>

<div class="mb-4">

    <small id="confirmInfo" class="text-danger d-none">

        <i class="fa-solid fa-circle-xmark"></i>

        Password tidak sama

    </small>

</div>

            <button class="btn btn-success w-100 btn-reset">

                Lanjutkan

            </button>

        </form>

    </div>

</div>

<script>

function toggle(id,el){

    let input=document.getElementById(id);

    let icon=el.querySelector("i");

    if(input.type==="password"){

        input.type="text";
        icon.classList.replace("fa-eye","fa-eye-slash");

    }else{

        input.type="password";
        icon.classList.replace("fa-eye-slash","fa-eye");

    }

}

const password=document.getElementById("password");
const confirm=document.getElementById("password_confirmation");

const passwordInfo=document.getElementById("passwordInfo");
const confirmInfo=document.getElementById("confirmInfo");

password.addEventListener("input",function(){

    if(this.value.length>=8){

        passwordInfo.className="text-success";

        passwordInfo.innerHTML=
        '<i class="fa-solid fa-circle-check"></i> Password minimal 8 karakter';

    }else{

        passwordInfo.className="text-danger";

        passwordInfo.innerHTML=
        '<i class="fa-solid fa-circle-xmark"></i> Password minimal 8 karakter';

    }

    checkConfirm();

});

confirm.addEventListener("input",checkConfirm);

function checkConfirm(){

    if(confirm.value==""){

        confirmInfo.classList.add("d-none");
        return;

    }

    confirmInfo.classList.remove("d-none");

    if(password.value===confirm.value){

        confirmInfo.className="text-success";

        confirmInfo.innerHTML=
        '<i class="fa-solid fa-circle-check"></i> Password cocok';

    }else{

        confirmInfo.className="text-danger";

        confirmInfo.innerHTML=
        '<i class="fa-solid fa-circle-xmark"></i> Password tidak sama';

    }

}

</script>
</body>

</html>