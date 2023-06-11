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
