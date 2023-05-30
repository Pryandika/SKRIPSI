<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script type="text/javascript" src={{ asset('/js/map.js') }}></script>

    <title>Admin</title>
</head>

<body>
    <x-app-layout>
        <div id="container">
            <div id="map"></div>
            <div id="sidebar">
                <div class="container mt-5">
                    <div class="row">
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">JALUR</div>
                            <br>UMUM
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">HARI</div>
                            <br>{{Auth::user()->tanggal_reservasi;}}
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">ANTRIAN</div>
                            <br>Nomor {{Auth::user()->no_antrian+1;}}
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">WAKTU</div>
                            <br><span id="waktu"></span>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">BIAYA</div>
                            <br>Rp.{{Auth::user()->biaya;}}
                        </div>
                      </div>
                    </div>
                  </div>

              <div id="panel"></div>
            </div>
          </div>
</x-app-layout>

<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1XnPw1i76KYYec7QX9UCWDDCo1_uCO2Y&callback=initMap&v=weekly"
defer
></script>
    
</body>

<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>



</html>
