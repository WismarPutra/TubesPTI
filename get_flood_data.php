<?php
//header('Content-Type: application/json');

$host = "localhost";
$user = "root";  // Sesuaikan dengan user database Anda
$pass = "";      // Sesuaikan dengan password database Anda
$dbname = "banjir";  // Sesuaikan dengan nama database

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Ambil semua data lokasi banjir
$sql = "SELECT nama_daerah, tanggal, deskripsi, longitude, latitude FROM lokasi_banjir";
$result = $conn->query($sql);

$locations = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
}

//echo json_encode($locations);

$conn->close();
?>
