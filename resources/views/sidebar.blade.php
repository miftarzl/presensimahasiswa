<!--**********************************
    Sidebar start
***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">	
        <ul class="metismenu" id="menu">
            <li>
    <a href="{{ route('dashboard') }}">
        <i class="material-icons">home</i>
        <span class="nav-text">Dashboard</span>
    </a>
</li>

<li>
    <a href="{{ url('student') }}">
        <i class="material-icons">groups</i>
        <span class="nav-text">Kelola Kelas</span>
    </a>
</li>

<li>
    <a href="{{ route('presensi') }}">
        <i class="material-icons">qr_code_scanner</i>
        <span class="nav-text">Presensi</span>
    </a>
</li>

<li>
    <a href="{{ route('laporan') }}">
        <i class="material-icons">assessment</i>
        <span class="nav-text">Laporan</span>
    </a>
</li>
         
        <div class="copyright">
            <p><strong>Universitas Gunadarma</strong></p>

<p class="fs-12">

Presensi Online Mahasiswa

</p>

<hr>

<p class="fs-12">
</p>
        </div>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->