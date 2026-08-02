<!DOCTYPE html>
<html>
<head>

    <title>Presensi Mahasiswa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet"
          href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>

        body{
            background:#f4f6fa;
        }

        #map{
            height:350px;
            width:100%;
            border-radius:15px;
            margin-top:15px;
            display:none;
            overflow:hidden;
        }

        .card{
            border-radius:20px;
        }

        #reader{
            max-width:500px;
            margin:auto;
        }

        @media(max-width:768px){

            #map{
                height:300px;
            }

        }

    </style>

</head>

<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">
                Presensi Mahasiswa
            </h3>

        </div>

        <div class="card-body">

            <div id="lokasi-status">

                Klik tombol di bawah untuk memeriksa lokasi Anda.

            </div>

            <div id="map"></div>

            <br>

            <button
                class="btn btn-primary"
                onclick="cekLokasi()">

                Cek Lokasi

            </button>

            <hr>

            <div id="scanner-section"
                 style="display:none;">

                <h5>
                    Scan QR Code
                </h5>

                <div id="reader"></div>

            </div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/html5-qrcode"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

let map = null;

function cekLokasi()
{
    if (!navigator.geolocation)
    {
        Swal.fire(
            'Error',
            'GPS tidak didukung browser',
            'error'
        );

        return;
    }

    navigator.geolocation.getCurrentPosition(

        function(position)
        {
            fetch(
                "{{ route('mahasiswa.checkLocation') }}",
                {
                    method: "POST",

                    headers: {
                        "Content-Type":"application/json",
                        "X-CSRF-TOKEN":
                        "{{ csrf_token() }}"
                    },

                    body: JSON.stringify({

                        lat:
                        position.coords.latitude,

                        lng:
                        position.coords.longitude

                    })
                }
            )
            .then(res => res.json())
            .then(data => {

                tampilkanMap(

                    position.coords.latitude,
                    position.coords.longitude,

                    data.attendance_lat,
                    data.attendance_lng,

                    data.radius

                );

                if(data.success)
                {
                    document.getElementById(
                        'lokasi-status'
                    ).innerHTML =

                    `
                    <div class="alert alert-success">

                        <strong>
                            Lokasi Valid
                        </strong>

                        <br>

                        Jarak Anda :
                        ${data.distance} meter

                    </div>
                    `;

                    document.getElementById(
                        'scanner-section'
                    ).style.display =
                    'block';

                    mulaiScanner();
                }
                else
                {
                    document.getElementById(
                        'lokasi-status'
                    ).innerHTML =

                    `
                    <div class="alert alert-danger">

                        ${data.message}

                        <br>

                        Jarak :
                        ${data.distance} meter

                        <br>

                        Radius :
                        ${data.radius} meter

                    </div>
                    `;
                }

            });

        },

        function()
        {
            Swal.fire(
                'Error',
                'GPS tidak dapat diakses',
                'error'
            );
        }

    );
}

function tampilkanMap(
    studentLat,
    studentLng,
    attendanceLat,
    attendanceLng,
    radius
)
{
    document.getElementById(
        'map'
    ).style.display = 'block';

    if(map)
    {
        map.remove();
    }

    map = L.map('map').setView(
        [attendanceLat, attendanceLng],
        17
    );

    L.tileLayer(
        'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom:19
        }
    ).addTo(map);

    L.marker([
        attendanceLat,
        attendanceLng
    ])
    .addTo(map)
    .bindPopup(
        'Lokasi Presensi'
    );

    L.marker([
        studentLat,
        studentLng
    ])
    .addTo(map)
    .bindPopup(
        'Lokasi Anda'
    );

    L.circle(
        [
            attendanceLat,
            attendanceLng
        ],
        {
            radius: radius
        }
    ).addTo(map);
}
function mulaiScanner()
{
    let scanner = new Html5QrcodeScanner(
        "reader",
        {
            fps:10,
            qrbox:250
        }
    );

    scanner.render(

        function(decodedText)
        {
            // HENTIKAN SCANNER
            scanner.clear();

            fetch(
                "{{ route('mahasiswa.scanQr') }}",
                {
                    method:"POST",

                    headers:{
                        "Content-Type":"application/json",

                        "X-CSRF-TOKEN":
                        "{{ csrf_token() }}"
                    },

                    body:JSON.stringify({
                        qr_token: decodedText
                    })
                }
            )
            .then(res => res.json())
            .then(data => {

                if(data.success)
                {
                    Swal.fire({
                        icon:'success',
                        title:'Presensi Berhasil',
                        text:'Kehadiran berhasil dicatat',
                        confirmButtonColor:'#5143C9'
                    }).then(() => {

                        window.location.href =
                        "{{ route('mahasiswa.dashboard') }}";

                    });
                }
                else
                {
                    Swal.fire({
                        icon:'warning',
                        title:'Presensi Ditolak',
                        text:data.message,
                        confirmButtonColor:'#5143C9'
                    }).then(() => {

                        window.location.href =
                        "{{ route('mahasiswa.dashboard') }}";

                    });
                }

            });
        }

    );
}

</script>

</body>
</html>