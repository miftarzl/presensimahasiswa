<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    	
   <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab" >
	<meta name="robots" content="" >
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management" >
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard" >
	<meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template" >
	<meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png" >
	<meta name="format-detection" content="telephone=no">



	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>Presensi Online Mahasiswa Gunadarma</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" >
	<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link href="{{ asset('vendor/wow-master/css/libs/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
	
	
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<!-- Style css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
    <style>
.presensi-card{
    border:none;
    border-radius:18px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.presensi-card:hover{
    transform:translateY(-3px);
}

.presensi-card .card-body{
    padding:25px;
}

.presensi-card p{
    margin-bottom:12px;
    font-size:15px;
}

.presensi-card i{
    width:22px;
}
    .presensi-card{
    border:none;
    border-radius:16px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.info-item{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:18px;
    font-size:15px;
}

.info-item i{
    width:22px;
    font-size:18px;
}

.info-item strong{
    color:#2c2c54;
}

.presensi-card{
    border:none;
    border-radius:18px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.presensi-card:hover{
    transform:translateY(-3px);
}

.presensi-card .card-body{
    padding:25px;
}

.presensi-card p{
    margin-bottom:12px;
    font-size:15px;
}

.presensi-card i{
    width:22px;
}
</style>
</head>
<body>

<div id="main-wrapper">


    @include('header')
           
 <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                    <div class="dashboard_bar">
                        Presensi
                    </div>
                    </div>
                    <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown all">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <svg height="24" class="svg-main-icon" viewBox="0 0 32 32" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="clip_1"><path id="artboard_1" clip-rule="evenodd" d="m0 0h32v32h-32z"/></clipPath><g id="select" clip-path="url(#clip_1)"><path id="Vector" d="m4.70222 7.16834-.12871-.2574c-.0593-.11861-.13904-.22136-.23922-.30824-.10018-.08689-.21317-.1513-.33898-.19323-.1258-.04194-.25484-.0582-.38711-.0488-.13228.0094-.25772.04375-.37633.10306-.24699.12349-.41414.31622-.50147.5782-.08732.26197-.06923.51645.05426.76344l1.32093 2.64183c.0593.1186.13904.2214.23922.3083.10018.0868.21317.1512.33898.1932.1258.0419.25484.0582.38711.0488.13228-.0094.25772-.0438.37633-.1031.01854-.0092.03678-.0191.05471-.0295s.03552-.0214.05277-.0329l5.99999-3.99995c.1104-.07356.2024-.16543.2762-.27561s.1237-.23029.1497-.36032c.026-.13004.0261-.2601.0004-.39019-.0257-.13008-.0754-.25029-.1489-.36063-.1532-.22977-.3652-.37173-.636-.42588-.2707-.05416-.521-.00465-.7508.14853l-1.94316 1.29545-3.1143 2.07619zm11.29778-1.16834c-.2761 0-.5118.09763-.7071.29289s-.2929.43097-.2929.70711.0976.51184.2929.70711c.1953.19526.431.29289.7071.29289h14c.2761 0 .5118-.09763.7071-.29289.1953-.19527.2929-.43097.2929-.70711s-.0976-.51185-.2929-.70711-.431-.29289-.7071-.29289zm-11.27691 9.1683-.12871-.2574c-.12349-.2469-.31622-.4141-.5782-.5014-.26197-.0874-.51645-.0693-.76344.0542-.11861.0593-.22135.1391-.30824.2393-.08688.1001-.15129.2131-.19323.3389-.04193.1258-.0582.2549-.0488.3871.0094.1323.04376.2578.10306.3764l1.32092 2.6418c.1235.247.31623.4142.5782.5015.26198.0873.51646.0692.76345-.0543.01854-.0092.03678-.0191.05471-.0295s.03552-.0214.05277-.0329l6.00002-3.9999c.2298-.1532.3717-.3652.4259-.636.0541-.2708.0046-.521-.1486-.7508-.1531-.2298-.3651-.3717-.6359-.4259-.2708-.0541-.521-.0046-.7508.1485l-5.05749 3.3717zm11.27691-.1683c-.2761 0-.5118.0976-.7071.2929s-.2929.431-.2929.7071.0976.5118.2929.7071.431.2929.7071.2929h14c.2761 0 .5118-.0976.7071-.2929s.2929-.431.2929-.7071-.0976-.5118-.2929-.7071-.431-.2929-.7071-.2929zm-11.27691 8.1683-.12871-.2574c-.12349-.247-.31622-.4141-.5782-.5014-.26197-.0874-.51645-.0693-.76344.0542-.11861.0593-.22135.1391-.30824.2393-.08688.1001-.15129.2131-.19323.3389-.04193.1258-.0582.2549-.0488.3871.0094.1323.04376.2578.10306.3764l1.32092 2.6418c.1235.247.31623.4142.5782.5015.26198.0873.51646.0692.76345-.0543.01854-.0092.03678-.0191.05471-.0295s.03552-.0214.05277-.0329l6.00002-4c.1103-.0735.2024-.1654.2762-.2756.0738-.1101.1237-.2303.1497-.3603s.0261-.2601.0004-.3902c-.0258-.1301-.0754-.2503-.149-.3606-.1531-.2298-.3651-.3717-.6359-.4259-.2708-.0541-.521-.0046-.7508.1485l-1.94319 1.2955-3.1143 2.0762zm11.27691.8317c-.2761 0-.5118.0976-.7071.2929s-.2929.431-.2929.7071.0976.5118.2929.7071.431.2929.7071.2929h14c.2761 0 .5118-.0976.7071-.2929s.2929-.431.2929-.7071-.0976-.5118-.2929-.7071-.431-.2929-.7071-.2929z" fill-rule="evenodd"/></g></svg>
                        </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="card mb-0">
                                    <div class="card-header border-0 d-block h-auto">
                                        <ul class="d-flex align-items-center justify-content-around">
                                            <li class="nav-item dropdown notification_dropdown">
                                                <a class="nav-link  menu-wallet" href="javascript:void(0);">
                                                        <svg id="Layer_1" enable-background="new 0 0 512 512" height="18" viewBox="0 0 512 512" width="18" xmlns="http://www.w3.org/2000/svg"><g><path d="m174 240h-108c-36.393 0-66-29.607-66-66v-108c0-36.393 29.607-66 66-66h108c36.393 0 66 29.607 66 66v108c0 36.393-29.607 66-66 66zm-108-208c-18.748 0-34 15.252-34 34v108c0 18.748 15.252 34 34 34h108c18.748 0 34-15.252 34-34v-108c0-18.748-15.252-34-34-34z"/><path d="m446 240h-108c-36.393 0-66-29.607-66-66v-108c0-36.393 29.607-66 66-66h108c36.393 0 66 29.607 66 66v108c0 36.393-29.607 66-66 66zm-108-208c-18.748 0-34 15.252-34 34v108c0 18.748 15.252 34 34 34h108c18.748 0 34-15.252 34-34v-108c0-18.748-15.252-34-34-34z"/><path d="m392 512c-66.168 0-120-53.832-120-120s53.832-120 120-120 120 53.832 120 120-53.832 120-120 120zm0-208c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88z"/><path d="m174 512h-108c-36.393 0-66-29.607-66-66v-108c0-36.393 29.607-66 66-66h108c36.393 0 66 29.607 66 66v108c0 36.393-29.607 66-66 66zm-108-208c-18.748 0-34 15.252-34 34v108c0 18.748 15.252 34 34 34h108c18.748 0 34-15.252 34-34v-108c0-18.748-15.252-34-34-34z"/></g></svg>
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown notification_dropdown">
                                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                                        <svg id="icon-light" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                                <svg id="icon-dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown notification_dropdown">
                                                <a class="nav-link bell dz-fullscreen"  href="javascript:void(0);">
                                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="A098AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                                </a>
                                            </li>
                                                            
                                        </ul>
                                    </div>
                                </div>
                            
                            </div>
                    </li>
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                <i id="icon-light-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg></i>
                                <i id="icon-dark-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell dz-fullscreen"  href="javascript:void(0);">
                                <svg id="icon-full-1" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                <svg id="icon-minimize-1" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="A098AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                            </a>
                        </li>

                                </div>
                                
                        <li class="nav-item">
                            <div class="dropdown header-profile2">
                                <a class="nav-link ms-0" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="header-info2 d-flex align-items-center">
                                        <div class="d-flex align-items-center sidebar-info">
                                            
                                        </div>
                                        <img src="{{ asset('images/user.jpg') }}" alt="">
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end pb-0" style="">
                                    <div class="card mb-0">
                                        <div class="card-header p-3">
                                            <ul class="d-flex align-items-center">
                                                <li>
                                                    <img src="{{ asset('images/user.jpg') }}" class="ms-0" alt="">
                                                </li>
                                                <li class="ms-2">
                                                    <h6>{{ Auth::guard('dosen')->user()->nama }}</h6>
                                                    <span>Dosen</span>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="card-body p-3">
                                            
                                            <a href="javascript:void(0)" class="dropdown-item ai-icon">
                                            <i class="fa fa-key fa-fw"></i>
                                            <span class="ms-2">Ubah Password</span>
                                            </a>
                                            

                                        </div>
                                        <div class="card-footer text-center p-3">
                                            <a href="{{ url('login') }}" class="dropdown-item ai-icon btn btn-primary light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                <span class="ms-2 text-primary">Logout </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
    </div>
    </head>
    <!--**********************************
    Header end ti-comment-alt
    ***********************************-->
    @include('sidebar')

    <div class="content-body">
        <div class="container-fluid">

          <!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <h4 class="mb-0">Presensi Mahasiswa</h4>

    <!-- BUTTON CREATE -->
    <button class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#createPresensi">
        + Buat Presensi
    </button>

</div>

<!-- SEARCH -->
<div class="row mb-4">
    <div class="col-md-5">

        <div class="input-group search-area">

            <input type="text"
                   id="searchAttendance"
                   class="form-control"
                   placeholder="Search here...">

            <span class="input-group-text">
                <a href="javascript:void(0)">
                    <svg width="15" height="15" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5605 15.4395L13.7527 11.6317C14.5395 10.446 15 9.02625 15 7.5C15 3.3645 11.6355 0 7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C9.02625 15 10.446 14.5395 11.6317 13.7527L15.4395 17.5605C16.0245 18.1462 16.9755 18.1462 17.5605 17.5605C18.1462 16.9747 18.1462 16.0252 17.5605 15.4395V15.4395ZM2.25 7.5C2.25 4.605 4.605 2.25 7.5 2.25C10.395 2.25 12.75 4.605 12.75 7.5C12.75 10.395 10.395 12.75 7.5 12.75C4.605 12.75 2.25 10.395 2.25 7.5V7.5Z"
                              fill="#01A3FF"/>
                    </svg>
                </a>
            </span>

        </div>

    </div>
</div>>

            <!-- ========================= -->
            <!-- MODAL CREATE -->
            <!-- ========================= -->
            <div class="modal fade" id="createPresensi">
                <div class="modal-dialog">
                    <form action="{{ route('presensi.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Buat Presensi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <label>Pilih Kelas</label>
                                <select name="class_id" class="form-control" required>
                                    @foreach($classes as $c)
                                        <option value="{{ $c->id }}">
                                            {{ $c->mata_kuliah }} - {{ $c->kode_kelas }}
                                        </option>
                                    @endforeach
                                </select>

                              <label>Tanggal</label>
<input type="date" name="tanggal" class="form-control mb-2" required>

<label>Pertemuan Ke</label>
<input type="number"
       name="pertemuan"
       class="form-control mb-3"
       placeholder="Contoh: 1"
       required>

<label>Jam Mulai Presensi</label>
<input type="time"
       name="start_time"
       class="form-control mb-2"
       required>

<label>Jam Selesai Presensi</label>
<input type="time"
       name="end_time"
       class="form-control mb-3"
       required>

<label>Mode Kelas</label>
<select name="mode" class="form-control mb-3" required>
    <option value="offline">Offline</option>
    <option value="online_zoom">Online (Zoom / Google Meet)</option>
    <option value="online_vclass">Online (Virtual Class)</option>
</select>
                    <!-- BUTTON AMBIL GPS -->
                    <button type="button" onclick="getLocation()" class="btn btn-info mb-2">
                        📍 Ambil Lokasi
                    </button>

                    <!-- HASIL GPS -->
                    <input type="text" id="lat" name="lat" class="form-control mb-2" placeholder="Latitude" readonly>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="Longitude" readonly>
                <div id="map" style="height: 300px;" class="mt-3"></div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Create</button>
                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ========================= -->
            <!-- QR CODE -->
            <!-- ========================= -->
            @if(isset($students) && count($students) > 0)

            <div class="text-center mb-4">
                <h5>QR Presensi</h5>

                {!! QrCode::size(200)->generate(now()->timestamp) !!}

                <p class="text-muted">QR berubah tiap 5 menit</p>
            </div>

            <script>
                setInterval(function(){
                    location.reload();
                }, 300000); // 5 menit
            </script>

            @endif
@if(isset($attendances) && count($attendances) > 0)
<div class="row">

@forelse($attendances as $attendance)

<div class="col-xl-6 col-lg-6 mb-4 attendance-card"
     data-matkul="{{ strtolower($attendance->kelas->mata_kuliah) }}"
     data-kode="{{ strtolower($attendance->kelas->kode_kelas) }}">

    <div class="card presensi-card h-100">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h5 class="fw-bold text-primary mb-0">
                    <i class="fas fa-clipboard-check me-2"></i>
                    Presensi
                </h5>

                <form action="{{ route('presensi.delete',$attendance->id) }}"
                      method="POST"
                      class="delete-form">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>

                </form>

            </div>

            <div class="info-item mb-3">

                <i class="fas fa-book text-primary me-2"></i>

                <strong>Kelas :</strong>

                @if($attendance->kelas)

                    {{ $attendance->kelas->mata_kuliah }}

                    <br>

                    <small class="text-muted">

                        {{ $attendance->kelas->kode_kelas }}

                    </small>

                @endif

            </div>

            <div class="info-item mb-3">

                <i class="fas fa-calendar-alt text-success me-2"></i>

                <strong>Tanggal :</strong>

                {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}

            </div>

            <div class="info-item mb-3">

                 <i class="fas fa-list-ol text-warning me-2"></i>

                <strong>Pertemuan :</strong>

                {{ $attendance->pertemuan }}

            </div>

            <div class="info-item mb-4">

                <i class="fas fa-users text-info me-2"></i>

                <strong>Mode :</strong>

                @if($attendance->mode=='offline')

                    <span class="badge bg-success">Offline</span>

                @elseif($attendance->mode=='online_zoom')

                    <span class="badge bg-primary">Zoom / Meet</span>

                @else

                    <span class="badge bg-info">Virtual Class</span>

                @endif

            </div>

            <a href="{{ route('presensi.detail',$attendance->id) }}"
               class="btn btn-primary w-100">

                <i class="fas fa-eye me-2"></i>

                Detail Kelas

            </a>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-info">

        Belum ada data presensi.

    </div>

</div>

@endforelse

</div>

            <!-- ========================= -->
            <!-- TABEL PRESENSI -->
            <!-- ========================= -->
            @if(isset($students) && count($students) > 0)

            <div class="card<div class="card presensi-card h-100">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->npm }}</td>

                                <td>
                                    <form action="{{ route('presensi.updateStatus', $s->id) }}" method="POST">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="hadir" {{ $s->status_presensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                            <option value="izin" {{ $s->status_presensi == 'izin' ? 'selected' : '' }}>Izin</option>
                                            <option value="sakit" {{ $s->status_presensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                            <option value="tidak hadir" {{ $s->status_presensi == 'tidak hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                        </select>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>


@endif

            @else

            <!-- KALAU BELUM CREATE -->
            <div class="alert alert-info">
                Silakan klik <b>+ Create Presensi</b> untuk memulai.
            </div>

            @endif

        </div>
    </div>

</div>
 <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	
	<!--datatables-->
	<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('vendor/wow-master/dist/wow.min.js') }}"></script>
	
	<script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var map = null;
var marker = null;

function getLocation() {
    if (!navigator.geolocation) {
        alert("Browser tidak mendukung GPS");
        return;
    }

    navigator.geolocation.getCurrentPosition(function(position) {
        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        document.getElementById("lat").value = lat;
        document.getElementById("lng").value = lng;

        if (map !== null) {
            map.remove();
            map = null;
        }

        map = L.map('map', {zoomControl: true});

        setTimeout(() => {
            map.invalidateSize();
        }, 200);

        map.setView([lat, lng], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        marker = L.marker([lat, lng]).addTo(map)
            .bindPopup("Lokasi Presensi")
            .openPopup();

        L.circle([lat, lng], {
            radius: 30,
            color: 'green',
            fillColor: '#0f0',
            fillOpacity: 0.2
        }).addTo(map);

    });
}
$('#createPresensi').on('shown.bs.modal', function () {
    setTimeout(function () {
        if (map !== null) {
            map.invalidateSize();
        }
    }, 300);
});
</script>
 <script>
document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({
            title: 'Hapus Presensi?',
            text: 'Data presensi yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',

            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',

            reverseButtons: true,

            customClass: {
                popup: 'rounded-4',
                confirmButton: 'px-4',
                cancelButton: 'px-4'
            }

        }).then((result) => {

            if(result.isConfirmed){

                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Presensi berhasil dihapus.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    form.submit();
                }, 500);
            }

        });

    });

});
</script> 
<script>

const searchAttendance = document.getElementById("searchAttendance");

if(searchAttendance){

    searchAttendance.addEventListener("keyup", function(){

        let keyword = this.value.toLowerCase();

        document.querySelectorAll(".attendance-card").forEach(function(card){

            let matkul = card.dataset.matkul;
            let kode   = card.dataset.kode;

            if(
                matkul.includes(keyword) ||
                kode.includes(keyword)
            ){
                card.style.display = "";
            }else{
                card.style.display = "none";
            }

        });

    });

}

</script> 
</body>
</html>