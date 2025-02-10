<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data no yang dikirim oleh index.php melalui URL
$no = $_GET['no'];
// Query untuk menghapus data lokasi berdasarkan no yang dikirim dari index.php melalui URL
$query = "DELETE FROM lokasi WHERE no='".$no."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
if($sql) { // Cek jika proses simpan ke database sukses atau tidak
// Jika Sukses, Lakukan :
header("location: index.php"); // Redirect ke halaman index.php
}else{
// Jika Gagal, Lakukan :
echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}