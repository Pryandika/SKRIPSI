    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
          height: 400px;
        width: 100%;
        }
    </style>

<x-app-layout>
  <div id="map"></div>
  <div class="text-center p-3 mb-2 bg-primary "> 
    <b>Peta Kurang Akurat?</b> <br>
    <b>Masukkan Lokasi Anda Saat Ini:</b>
    <form id="form-alamat">
    <x-text-input id="from" class="text-black px-4" placeholder="Dari" value="Denpasar" />
    <input id="to" placeholder="To" value="Antwerpen" hidden/>
    <input type="submit" class="items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" value="GO"  />
  </form>
</div>
    <div id="sidebar">
      <div class="container">
      </div>
        <div class="mx-5 mt-5">
            <div class="row">
              <div class="col-sm">
                <div class="text-center">
                    <div class="font-weight-bold">JALUR PENDAFTARAN</div>
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
                    <div> {{Auth::user()->estimasi_dilayani}}</div>
                    <div class="mb-5"></div>
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






    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyD1XnPw1i76KYYec7QX9UCWDDCo1_uCO2Y&libraries=geometry&callback=Function.prototype&v=weekly"></script>
    <script>
        var map;
        var directionsService;
        var polylines = [];
        var shadows = [];
        var data = [];
        var infowindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: { lat: -8.4095, lng: 115.1889 }, // Bali.
            });
            const formAlamat = document.getElementById('form-alamat');
            formAlamat.addEventListener('submit', function(e) {
                calcRoute(
                    document.getElementById('from').value,
                    'RSU BANGLI'
                );
                // prevent the form from really submitting
                e.preventDefault();
                return false;
            });
            directionsService = new google.maps.DirectionsService();

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
            calcRoute(
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

            // get the bounds of the polyline
            // http://stackoverflow.com/questions/3284808/getting-the-bounds-of-a-polyine-in-google-maps-api-v3
            google.maps.Polyline.prototype.getBounds = function(startBounds) {
                if(startBounds) {
                    var bounds = startBounds;
                }
                else {
                    var bounds = new google.maps.LatLngBounds();
                }
                this.getPath().forEach(function(item, index) {
                    bounds.extend(new google.maps.LatLng(item.lat(), item.lng()));
                });
                return bounds;
            };
        }
        // this function calculates multiple suggested routes.
        // We will draw 3 (broad stroke) suggested routs in grey.  These are broad to click on them easier.
        // We duplicate these routes with a thin, colored line; only route 0 is shown.
        function calcRoute(start, end) {
            var request = {
                origin: start,
                destination: end,
                provideRouteAlternatives: true,
                unitSystem: google.maps.UnitSystem.METRIC,
                travelMode: google.maps.TravelMode['DRIVING']
            };
            directionsService.route(request, function(response, status) {
                    var durasi = response.routes[0].legs[0].duration.text;
                    document.getElementById("waktu").innerHTML = durasi;
                for(var j in  polylines ) {
                    polylines[j].setMap(null);
                    shadows[j].setMap(null);
                }
                polylines = [];
                shadows = [];
                data = [];
                if (status == google.maps.DirectionsStatus.OK) {
                    var bounds = new google.maps.LatLngBounds();

                    for(var i in response.routes) {
                        // let's make the first suggestion highlighted;
                        var hide = (i==0 ? false : true);
                        var shadow = drawPolylineShadow(response.routes[i].overview_path, '#666666');
                        var line = drawPolyline(response.routes[i].overview_path, '#0000ff', hide);

                        polylines.push(line);
                        shadows.push(shadow);
                        // let's add some data for the infoWindow
                        data.push({
                            distance: response.routes[i].legs[0].distance,
                            duration: response.routes[i].legs[0].duration,
                            end_address: response.routes[i].legs[0].end_address,
                            start_address: response.routes[i].legs[0].start_address,
                            end_location: response.routes[i].legs[0].end_location,
                            start_location: response.routes[i].legs[0].start_location
                        });
                        bounds = line.getBounds(bounds);
                        google.maps.event.addListener(shadow, 'click', function(e) {
                            // detect which route was clicked on
                            var index = shadows.indexOf(this);
                            highlightRoute(index, e);
                            
                        });

                    }
                    map.fitBounds(bounds);
                }
            });
        }
        // this makes one of the colored routes visible.
        function highlightRoute(index, e) {
            for(var j in  polylines ) {
                if(j==index) {
                    //var color = '#0000ff';
                    polylines[j].setMap(map);
                    // feel free to customise this string
                    document.getElementById("waktu").innerHTML = data[j].duration.text;
                    var contentString =
                        '<span>'+ data[j].distance.text +'</span><br/>'+
                        '<span>'+ data[j].duration.text +'</span><br/>'+
                        '<span>route: '+ j +'</span><br/>'+
                        //'From: <span>'+ data[j].start_address +'</span><br/>'+
                        //'To: <span>'+ data[j].end_address +'</span><br/>'+
                        '';
                    if(e) {
                       var position = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
                        // it may be needed to close the previous infoWindow
                        if(infowindow) {
                            infowindow.close();
                            infowindow = null;
                        }
                        infowindow = new google.maps.InfoWindow({
                            content: contentString,
                            position: position,
                            map: map
                        });
                        //infowindow.open(map, polylines[j]);
                    }
                }
                else {
                    polylines[j].setMap(null);
                }
            }
        }
        // returns a polyline.
        // if hide is set to true, the line is not put on the map
        function drawPolyline(path, color, hide=true) {
            var line = new google.maps.Polyline({
                path: path,
                strokeColor: color,
                strokeOpacity: 0.9,
                strokeWeight: 3
            });
            if(! hide) {
                line.setMap(map);
            }
            return line;
        }
        function drawPolylineShadow(path, color, hide) {
            var line = new google.maps.Polyline({
                path: path,
                strokeColor: color,
                strokeOpacity: 0.4,
                strokeWeight: 7
            });
            if(! hide) {
                line.setMap(map);
            }
            return line;
        }
        function calcWaktu(result) {
        const waktu = result.routes[0].legs[0].duration.text;
        
    }
    window.addEventListener('load', initMap);

    window.onload = function biayaKoma() {
    var x = document.getElementById("biaya").innerHTML;
    var koma = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("biayaKoma").innerHTML = "Rp." + koma;
  }
    </script>
</body>
</html> 