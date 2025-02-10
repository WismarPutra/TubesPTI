<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD MAPBOX</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.18.1/dist/full.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapboxgl.js"></script>
</head>
<body>
    <div class="h-screen text-black w-screen space-y-5" data-theme="corporate">
        <div class="text-xl font-bold pt-5 text-center">
            CRUD MAPBOX
        </div>

        <div class="flex justify-center space-x-5">
            <a href="form_tambah.php">
                <button class="btn btn-primary">Tambah Data</button>
            </a>
            <a href="posisi_saya.php">
                <button class="btn btn-primary">Posisi Saya</button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full text-black text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota/Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Kode Pos</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";
                    $query = "SELECT * FROM lokasi"; // Query untuk menampilkan semua data lokasi
                    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>" . $data['no'] . "</td>";
                        echo "<td>" . $data['alamat'] . "</td>";
                        echo "<td>" . $data['latitude'] . "</td>";
                        echo "<td>" . $data['longitude'] . "</td>";
                        echo "<td>" . $data['kelurahan'] . "</td>";
                        echo "<td>" . $data['kecamatan'] . "</td>";
                        echo "<td>" . $data['kota'] . "</td>";
                        echo "<td>" . $data['provinsi'] . "</td>";
                        echo "<td>" . $data['kode_pos'] . "</td>";
                        echo "<td><button class='btn btn-primary'><a href='form_ubah.php?no=" . $data['no'] . "'>Ubah</a></button></td>";
                        echo "<td><button class='btn btn-primary'><a href='proses_hapus.php?no=" . $data['no'] . "'>Hapus</a></button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
