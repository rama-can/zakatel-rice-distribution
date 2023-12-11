@push('styles')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" type="text/css">
    <style>
    body { margin: 0; padding: 0; }
    /* Menghilangkan duplikat dari kelas "mapboxgl-ctrl-directions" */
    .mapboxgl-ctrl-directions:not(:first-child) {
    display: none !important;
    }

    /* Menghilangkan petunjuk manuver */
    .directions-control-instructions {
    display: none !important;
    }

    /* Menghilangkan petunjuk manuver */
    .mapbox-directions-profile {
    display: none !important;
    }
</style>
@endpush

<div id="map" style="height: 500px; width: 500px;"></div>
<div id="directions" style="position: absolute; top: 10px; right: 10px; width: 400px;"></div>
<input type="text" name="destination" value="">

@push('scripts')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiY29kZW5pYWdhIiwiYSI6ImNsb2lqZm4xZjFrNXoycnBsbzgyMXlteWsifQ.3hxB1A0jgdbATU49PvgwkQ';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [107.63204,-6.90938], // Default location (Bandung)
        zoom: 15
    });
    var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken,
        unit: 'metric',
        profile: 'mapbox/driving-traffic',
        alternatives: false,
        language: 'en',
        interactive: true,
        origin: [107.63204, -6.90938] // Mendefaultkan titik awal
    });
    // Menambahkan kontrol ke peta
    map.addControl(directions, 'top-left');

    map.on('load', () => {
        directions.setOrigin([107.63204,-6.90938]); // titik awal Anda
    });
    // Menambahkan event listener untuk menangani perubahan alamat tujuan
    directions.on('route', function(e) {
        if (e.route && e.route[0] && e.route[0].legs && e.route[0].legs[0] && e.route[0].legs[0].steps) {
            const destination = e.route[0].legs[0].steps[e.route[0].legs[0].steps.length - 1].maneuver.location;

            // Memperbarui nilai input "destination" dengan koordinat tujuan yang valid
            document.getElementsByName('destination')[0].value = destination[0] + ', ' + destination[1];
        }
    });
</script>
@endpush
