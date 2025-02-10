<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$no = $_POST['no'];
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
$query = "INSERT INTO lokasi VALUES('" . $no . "','" . $alamat . "', '" .
$latitude . "', '" . $longitude . "', '" . $kelurahan . "', '" . $kecamatan
. "', '" . $kota . "', '" . $provinsi . "', '" . $kode_pos . "')";
$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
// Jika Sukses, Lakukan :
header("location: index.php"); // Redirect ke halaman index.php
} else {
// Jika Gagal, Lakukan :
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke
database.";
echo "<br><a href='form_tambah.php'>Kembali Ke Form</a>";
}
