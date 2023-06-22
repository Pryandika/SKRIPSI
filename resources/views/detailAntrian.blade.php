
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1XnPw1i76KYYec7QX9UCWDDCo1_uCO2Y&callback=initMap&v=weekly"
  async defer
>
</script>
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
          </div>
      </x-app-layouts>

<script>
  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 9,
        center: { lat: -8.4095, lng: 115.1889 }, // Bali.
    });
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer({
        draggable: true,
        map,
        // panel: document.getElementById("panel"),
    });

    directionsRenderer.addListener("directions_changed", () => {
        const directions = directionsRenderer.getDirections();

        if (directions) {
            calcWaktu(directions);
        }
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
            calcRouteMap(
                pos,
                { lat: -8.4564415307019, lng: 115.35314530432309 },
                directionsService,
                directionsRenderer
            );
        });
    } else {
        // Browser doesn't support Geolocation
        alert("Geolocation is not supported by your browser.");
    }
}

function calcRouteMap(origin, destination, service, display) {
    service
        .route({
            origin: origin,
            destination: destination,
            travelMode: google.maps.TravelMode.DRIVING,
            avoidTolls: true,
        })
        .then((result) => {
            display.setDirections(result);
        })
        .catch(() => {});
}

function calcWaktu(result) {
    const waktu = result.routes[0].legs[0].duration.text;
    document.getElementById("waktu").innerHTML = waktu;
}

window.initMap = initMap;

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
