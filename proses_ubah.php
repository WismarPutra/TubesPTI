<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data no yang dikirim oleh form_ubah.php melalui URL
$no = $_GET['no'];
// Ambil Data yang Dikirim dari Form
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
// Proses ubah data ke Database
$query = "UPDATE lokasi SET alamat='" . $alamat . "', latitude='" .
$latitude . "', longitude='" . $longitude . "', kelurahan='" . $kelurahan .
"', kecamatan='" . $kecamatan . "', kota='" . $kota . "', provinsi='" .
$provinsi . "', kode_pos='" . $kode_pos . "' WHERE no='" . $no . "'";
$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
// Jika Sukses, Lakukan :
header("location: index.php"); // Redirect ke halaman index.php
} else {
// Jika Gagal, Lakukan :
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke
database.";
echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
}
