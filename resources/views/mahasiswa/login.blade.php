<!DOCTYPE html>
<html>
<head>
    <title>Login Mahasiswa</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card">

                <div class="card-header text-center">
                    <h3>Login Mahasiswa</h3>
                </div>

                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.authenticate') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label>NPM</label>

                            <input type="text"
                                   name="npm"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>