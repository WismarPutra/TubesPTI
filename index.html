<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FUZZIES</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.18.1/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class='head-container'>
        <h1>FUZZIES</h1>
    </nav>
    <div class="relative h-screen">
        <div id='map' class="absolute inset-0"></div>
        <div class="absolute top-4 left-4 bg-white p-4 shadow-lg rounded-lg">
            <div id="geocoder" class="w-full"></div>
            <div id="geolocate" class="mt-2"></div>
        </div>

        <!-- Tombol Widget Cuaca di Bawah Searchbar -->
        <button id="cuacaBtn" class="absolute top-24 left-4 bg-gray-800 text-white p-4 shadow-lg rounded-lg flex items-center">
            <span id="cuacaIcon">☁️</span>
            <span id="cuacaTemp" class="ml-2">-°C</span>
        </button>

        <!-- Detail Cuaca Popup -->
        <div id="cuacaDetail" class="hidden absolute top-36 left-4 bg-gray-900 text-white p-4 shadow-lg rounded-lg w-64">
            <h2 id="cuacaLokasi" class="text-lg font-semibold text-center">-</h2>
            <p class="text-center text-3xl"><span id="cuacaDetailTemp">-</span>°C</p>
            <p class="text-center text-sm"><span id="cuacaDeskripsi">-</span></p>
            <p class="text-center text-sm">Feels like: <span id="feelsLike">-</span>°C</p>
            <p class="text-center text-sm">H: <span id="highTemp">-</span>° L: <span id="lowTemp">-</span>°</p>
            <button id="banjirBtn" class="mt-4 w-full bg-red-600 p-2 rounded-lg">Banjir</button>
            <button id="closeBtn" class="mt-4 w-full bg-teal-600 p-2 rounded-lg">Close</button>
        </div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3RpZmFuaGlsZmEiLCJhIjoiY202N2JydGVxMDJtaDJ0cXpzMTN4czJkcSJ9.PEGsK7u2CRNZJ9h0g9x1PA';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/traffic-day-v2',
            center: [107.6145, -6.9167],
            zoom: 12
        });

        // Data lokasi banjir dengan nama, deskripsi, dan koordinat
        const floodLocations = [
            { name: "Cicaheum", deskripsi: "Lokasi rawan banjir, waspada.", coordinates: [107.657509, -6.902177] },
            { name: "Dayeuhkolot", deskripsi: "Lokasi rawan banjir, cek cuaca.", coordinates: [107.6300, -6.9900] },
            { name: "Pasteur", deskripsi: "Daerah dengan risiko banjir tinggi.", coordinates: [107.587123, -6.893915] },
            { name: "Gede Bage", deskripsi: "Daerah dengan risiko banjir rendah.", coordinates: [107.692326, -6.937022] }
        ];

        let markers = []; // Array untuk menyimpan marker
        let markersVisible = false; // Status apakah marker terlihat atau tidak

        // Tambahkan marker ke peta dan sembunyikan
        floodLocations.forEach(location => {
            let marker = new mapboxgl.Marker({ color: "red" })
                .setLngLat(location.coordinates)
                .addTo(map);

            // Set Popup dengan data dari array
            marker.setPopup(new mapboxgl.Popup().setHTML(`
                <strong>${location.name}</strong><br>
                ${location.deskripsi}
            `));

            // Menambahkan event listener untuk klik pada marker
            marker.getElement().addEventListener('click', function() {
                // Melakukan request AJAX untuk mendapatkan data berdasarkan nama marker
                fetch(`get_data.php?nama_daerah=${location.name}`)
                    .then(response => response.text())
                    .then(data => {
                        // Mengubah konten popup dengan data yang didapat dari server
                        marker.setPopup(new mapboxgl.Popup().setHTML(data));
                        marker.togglePopup(); // Tampilkan popup yang baru
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });

            markers.push(marker); // Simpan marker ke array
            marker.getElement().style.display = "none"; // Sembunyikan marker dari peta
        });

        // Fungsi untuk menampilkan atau menyembunyikan marker
        document.getElementById("banjirBtn").addEventListener("click", function() {
            markersVisible = !markersVisible; // Toggle status visibility

            markers.forEach(marker => {
                marker.getElement().style.display = markersVisible ? "block" : "none";
            });

            // Ubah teks tombol jika perlu
            this.innerText = markersVisible ? "Sembunyikan Banjir" : "Banjir";
        });

        // Tambahkan Layer Traffic
        map.on('load', function () {
            map.addLayer({
                id: 'traffic',
                type: 'line',
                source: {
                    type: 'vector',
                    url: 'mapbox://mapbox.mapbox-traffic-v1'
                },
                'source-layer': 'traffic',
                layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                paint: {
                    'line-color': [
                        'match',
                        ['get', 'congestion'],
                        'low', '#2DC4B2',
                        'moderate', '#FFA726',
                        'heavy', '#FF5722',
                        'severe', '#B71C1C',
                        '#CCCCCC'
                    ],
                    'line-width': 2
                }
            });
        });

        const geolocate = new mapboxgl.GeolocateControl({
            positionOptions: { enableHighAccuracy: true },
            trackUserLocation: true,
            showUserHeading: true
        });
        map.addControl(geolocate);

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: true,
            placeholder: 'Cari lokasi...'
        });
        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

        // Fungsi untuk mendapatkan cuaca
        function getWeather(lat, lon) {
            const API_KEY = 'f27b269d54e4fa1e72993364a80fa8bd';
            const MAPBOX_ACCESS_TOKEN = 'pk.eyJ1Ijoic3RpZmFuaGlsZmEiLCJhIjoiY202N2JydGVxMDJtaDJ0cXpzMTN4czJkcSJ9.PEGsK7u2CRNZJ9h0g9x1PA';

            // Ambil nama lokasi dari Mapbox
            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lon},${lat}.json?access_token=${MAPBOX_ACCESS_TOKEN}&limit=1`)
                .then(response => response.json())
                .then(data => {
                    if (data.features.length > 0) {
                        document.getElementById("cuacaLokasi").innerText = data.features[0].place_name;
                    }
                });

            // Ambil data cuaca dari OpenWeatherMap
            fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${API_KEY}`)
                .then(response => response.json())
                .then(data => {
                    if (data.main) {
                        document.getElementById("cuacaTemp").innerText = `${Math.round(data.main.temp)}°C`;
                        document.getElementById("cuacaDetailTemp").innerText = Math.round(data.main.temp);
                        document.getElementById("cuacaDeskripsi").innerText = data.weather[0].description;
                        document.getElementById("feelsLike").innerText = Math.round(data.main.feels_like);
                        document.getElementById("highTemp").innerText = Math.round(data.main.temp_max);
                        document.getElementById("lowTemp").innerText = Math.round(data.main.temp_min);
                        let icon = "☁️";
                        switch (data.weather[0].main) {
                            case "Clear": icon = "☀️"; break;
                            case "Rain": icon = "🌧️"; break;
                            case "Snow": icon = "❄️"; break;
                            case "Mist": icon = "🌫️"; break;
                        }
                        document.getElementById("cuacaIcon").innerText = icon;
                    }
                });
        }

        // Update cuaca berdasarkan lokasi
        geolocate.on('geolocate', function(e) {
            const lat = e.coords.latitude;
            const lon = e.coords.longitude;
            getWeather(lat, lon);
            setInterval(() => getWeather(lat, lon), 3600000); // 1 jam berubah
        });

        // Geocoder
        geocoder.on('result', function(e) {
            const [lon, lat] = e.result.center;
            getWeather(lat, lon);
            setInterval(() => getWeather(lat, lon), 3600000); // 1 jam berubah
        });

        // Toggle cuaca detail
        document.getElementById("cuacaBtn").addEventListener("click", function() {
            document.getElementById("cuacaDetail").classList.toggle("hidden");
        });

        // Close cuaca detail
        document.getElementById("closeBtn").addEventListener("click", function() {
            document.getElementById("cuacaDetail").classList.add("hidden");
        });
    </script>
</body>
</html>
