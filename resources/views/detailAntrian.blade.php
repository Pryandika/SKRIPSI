<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <title>RSUD Bangli</title>
</head>

<body>
    <x-app-layout>
            <div id="map"></div>
            <div id="sidebar">
                <div class="mx-5 mt-5">
                    <div class="row">
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">JALUR</div>
                            <div class="mb-5">{{Auth::user()->jalur;}}</div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">HARI</div>
                            <div class="mb-5">{{Auth::user()->tanggal_reservasi;}}</div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">ANTRIAN</div>
                            @if (is_null($auser->no_antrian))
                              <div class="mb-5">-</div>
                            @else
                            <div class="mb-5">Nomor {{Auth::user()->no_antrian;}}</div> 
                            @endif
                            
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">ANTRIAN BERJALAN</div>
                            @if (is_null($auser->no_antrian))
                            <div class="mb-5">-</div>
                          @else
                          <div class="mb-5">Nomor {{$minAntri}}</div>
                          @endif
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">SISA ANTRIAN</div>
                            @if ($sisaAntri < 0)
                            <div class="mb-5">-</div>
                            @elseif ($sisaAntri == 0)
                            <div class="mb-5">0 Nomor</div>
                            @else
                            <div class="mb-5">{{$sisaAntri}} Nomor</div>
                            @endif
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">WAKTU PERJALANAN</div>
                            @if (is_null($auser->no_antrian))
                              <div class="mb-5">-</div>
                            @else
                            <div class="mb-5"><span id="waktu"></span></div>
                            @endif
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">ESTIMASI WAKTU DILAYANI</div>
                            @if ($estimasiAntri < 0)
                            <div class="mb-5">Terlayani</div>
                            @elseif ($estimasiAntri == 0)
                            <div class="mb-5">0 Menit</div>
                            @else
                            <div class="mb-5">{{$estimasiAntri}} Menit</div>
                            @endif
                    
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="text-center">
                            <div class="font-weight-bold">BIAYA</div>
                            <div id="biaya" value="{{Auth::user()->biaya}}" hidden>{{Auth::user()->biaya}}</div>
                            <div class="mb-5" id="biayaKoma"></div>
                        </div>
                      </div>
                    </div>
                  </div>
              <div id="panel"></div>
            </div>
</x-app-layout>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1XnPw1i76KYYec7QX9UCWDDCo1_uCO2Y&callback=initMap&v=weekly"
  defer
>
</script>

<script>
  window.onload = function biayaKoma() {
    var x = document.getElementById("biaya").innerHTML;
    var koma = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("biayaKoma").innerHTML = "Rp." + koma;
  }
</script>
</body>

<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>



</html>
