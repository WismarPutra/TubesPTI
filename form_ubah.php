<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UBAH DATA</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <!-- Import elemen dasar Mapbox -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
    <!-- Import Geocoder Mapbox -->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <!-- Import Tailwind dan DaisyUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.18.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Import ReactJS untuk menggunakan hook useState -->
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
</head>
<body>
    <?php
        // Load file koneksi.php
        include "koneksi.php";

        // Ambil data no yang dikirim oleh index.php melalui URL
        $no = $_GET['no'];

        // Query untuk menampilkan data lokasi berdasarkan no yang dikirim
        $query = "SELECT * FROM lokasi WHERE no='" . $no . "'";
        $sql = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($sql);
    ?>
    <form 
        name="formInput" 
        method="post" 
        action="proses_ubah.php?no=<?php echo $no; ?>" 
        enctype="multipart/form-data" 
        data-theme="corporate" 
        onsubmit="return validateForm()"
    >
        <div class="h-full w-full space-y-5 text-black px-10 bg-white">
            <div class="text-xl font-bold pt-5 text-center">UBAH DATA</div>
            <div class="h-screen w-full px-20">
                <div id="map" class="w-full h-4/5 top-0 rounded"></div>
            </div>
            <div id="formLokasi" class="grid-none md:grid md:grid-cols-2 md:space-x-5 space-x-none">
                <div class="space-y-5">
                    <div>
                        <p>Cari lokasi :</p>
                        <div name="geocoder" id="geocoder" class="w-full"></div>
                    </div>
                    <div class="flex flex-wrap">
                        Atau klik untuk mengetahui lokasi saat ini &ensp;
                        <div name="geolocate" id="geolocate"></div>
                    </div>
                    <div>
                        <p>Beri nama lokasi :</p>
                        <input 
                            type="text" 
                            name="alamat" 
                            id="alamat" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['alamat']; ?>" 
                        />
                    </div>
                </div>
                <div class="space-y-5">
                    <div>
                        <p>Latitude :</p>
                        <input 
                            type="text" 
                            name="latitude" 
                            id="latitude" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['latitude']; ?>" 
                        />
                    </div>
                    <div>
                        <p>Longitude :</p>
                        <input 
                            type="text" 
                            name="longitude" 
                            id="longitude" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['longitude']; ?>" 
                        />
                    </div>
                    <div>
                        <p>Kelurahan :</p>
                        <input 
                            type="text" 
                            name="kelurahan" 
                            id="kelurahan" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['kelurahan']; ?>" 
                        />
                    </div>
                    <div>
                        <p>Kecamatan :</p>
                        <input 
                            type="text" 
                            name="kecamatan" 
                            id="kecamatan" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['kecamatan']; ?>" 
                        />
                    </div>
                    <div>
                        <p>Kota/Kabupaten :</p>
                        <input 
                            type="text" 
                            name="kota" 
                            id="kota" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['kota']; ?>" 
                        />
                    </div>
                    <div>
                        <p>Provinsi :</p>
                        <input 
                            type="text" 
                            name="provinsi" 
                            id="provinsi" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['provinsi']; ?>" 
                        />
                    </div>
                    <div>
                        <p>Kode Pos :</p>
                        <input 
                            type="text" 
                            name="kode_pos" 
                            id="kode_pos" 
                            class="text-black h-9 rounded w-full shadow-lg" 
                            value="<?php echo $data['kode_pos']; ?>" 
                        />
                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <button type="submit" class="text-center btn btn-wide bg-blue-500 width-30 border-none">SIMPAN</button>
            </div>
            <br>
            <hr>
            <div class="text-xl font-bold pt-5 text-center">PRAKIRAAN CUACA</div>
            <p class="text-center">Mendapatkan info tentang prakiraan cuaca dari kecamatan/desa yang telah dipilih</p>
            <div id="tombol_cek_cuaca" class="text-center bg-blue-500 hover:bg-black py-2 w-1/4 rounded-lg m-auto text-white"></div>
            <br>
            <!-- Load React component -->
            <script src="cuaca.js"></script>
            <div class="grid grid-cols-3 text-center h-1/4">
                <div>
                    <br>Cuaca Hari Ini :
                    <p id="cuaca1" class="py-10"></p>
                    <br><br>
                </div>
                <div>
                    <br>Cuaca Besok :
                    <p id="cuaca2" class="py-10"></p>
                    <br><br>
                </div>
                <div>
                    <br>Cuaca Lusa :
                    <p id="cuaca3" class="py-10"></p>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3RpZmFuaGlsZmEiLCJhIjoiY202N2JydGVxMDJtaDJ0cXpzMTN4czJkcSJ9.PEGsK7u2CRNZJ9h0g9x1PA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [107.6145, -6.9167],
            zoom: 12
        });

        // Menambahkan kontrol geocoder
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });

        // Menambahkan kontrol geolocate
        const geolocate = new mapboxgl.GeolocateControl({
            positionOptions: { enableHighAccuracy: true },
            trackUserLocation: true,
            showUserHeading: true
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
        document.getElementById('geolocate').appendChild(geolocate.onAdd(map));

        map.on('style.load', function () {
            map.on('click', function (e) {
                var longitude = e.lngLat.lng;
                var latitude = e.lngLat.lat;
                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function () {
                    let responseJSON = JSON.parse(this.responseText);
                    let kelurahan = responseJSON.features[0].context[0].text;
                    let kode_pos = responseJSON.features[0].context[1].text;
                    let kecamatan = responseJSON.features[0].context[2].text;
                    let kota = responseJSON.features[0].context[3].text;
                    let provinsi = responseJSON.features[0].context[4].text;

                    document.getElementById("kelurahan").value = kelurahan;
                    document.getElementById("kode_pos").value = kode_pos;
                    document.getElementById("kecamatan").value = kecamatan;
                    document.getElementById("kota").value = kota;
                    document.getElementById("provinsi").value = provinsi;
                };

                xhttp.open("GET", "https://api.mapbox.com/geocoding/v5/mapbox.places/" + longitude + "," + latitude + ".json?country=id&types=neighborhood%2Clocality%2Cplace%2Cdistrict%2Cpostcode%2Cregion%2Caddress%2Cpoi&language=id&limit=1&access_token=ISI DENGAN MAPBOX KEY ANDA", true);
                xhttp.send();
            });
        });

        // Validasi input
        function validateForm() {
            var a = document.getElementById("alamat").value;
            var b = document.getElementById("latitude").value;
            var c = document.getElementById("longitude").value;

            if (!a || !b || !c) {
                alert("Harap melengkapi semua data yang diperlukan");
                return false;
            }
        }
    </script>
</body>
</html>
