<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Presensi Online Mahasiswa Gunadarma</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/wow-master/css/libs/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @stack('css')

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

            @yield('content')

        </div>

    </div>

</div>

<script src="{{ asset('js/search.js') }}"></script>

<script src="{{ asset('vendor/global/global.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>

<script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>

<script src="{{ asset('js/dlabnav-init.js') }}"></script>

<script src="{{ asset('js/demo.js') }}"></script>

@stack('js')

</body>

</html>