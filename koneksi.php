<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banjir"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data lokasi banjir
$sql = "SELECT Nama_daerah, Tanggal, Deskripsi, longitude, latitude FROM lokasi_banjir";
$result = $conn->query($sql);

$locations = array();
if ($result->num_rows > 0) {
    // Menyusun data ke dalam array
    while($row = $result->fetch_assoc()) {
        $locations[] = array(
            "name" => $row["Nama_daerah"],
            "tanggal" => $row["Tanggal"],
            "deskripsi" => $row["Deskripsi"],
            "coordinates" => array((float)$row["longitude"], (float)$row["latitude"])
        );
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($locations);

$conn->close();
?>
