
function initMap() {
  const uLat = parseInt(sessionStorage.getItem('userLat'));
  const uLong = parseInt(sessionStorage.getItem('userLong'));
  document.getElementById("lat").value = uLat;
  document.getElementById("long").value = uLong;

  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 9,
    center: { lat: -8.4095, lng: 115.1889 }, // Bali.
  });
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer({
    draggable: true,
    map,
    panel: document.getElementById("panel"),
  });

  directionsRenderer.addListener("directions_changed", () => {
    const directions = directionsRenderer.getDirections();

    if (directions) {
      computeTotalDistance(directions);
    }
  });
  
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
        displayRoute(
          pos,
          { lat: -8.4564415307019, lng: 115.35314530432309 },
          directionsService,
          directionsRenderer
        );
      },
    );

  } else {
    // Browser doesn't support Geolocation
    alert('Geolocation is not supported by your browser.');
  }
  

}

function displayRoute(origin, destination, service, display) {
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
    .catch((e) => {
      alert("Could not display directions due to: " + e);
    });
}

function computeTotalDistance(result) {
  let total = 0;
  const myroute = result.routes[0];

  if (!myroute) {
    return;
  }

  for (let i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }

  total = total / 1000;
  document.getElementById("total").innerHTML = total + " km";
}

window.initMap = initMap;