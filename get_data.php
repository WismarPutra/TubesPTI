<?php
// Informasi koneksi database
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "banjirr"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah ada parameter 'nama_daerah' yang diterima
if (isset($_GET['nama_daerah'])) {
    $nama_daerah = $_GET['nama_daerah'];

    // Query untuk mengambil data berdasarkan Nama_daerah
    $sql = "SELECT id_daerah, Nama_daerah, Tanggal, Deskripsi, longitude, latitude 
            FROM lokasi_banjir
            WHERE Nama_daerah = ?"; // Menggunakan parameterisasi untuk menghindari SQL Injection

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama_daerah); // Bind parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Menampilkan data dalam bentuk HTML
    if ($result->num_rows > 0) {
        // Memulai konten untuk popup
        $data = "<h3>Informasi Lokasi: $nama_daerah</h3><br>";
        
        while ($row = $result->fetch_assoc()) {
            $data .= "
                        
                            " . $row["id_daerah"] . "<br>
                            " . $row["Nama_daerah"] . "<br>
                            " . $row["Tanggal"] . "<br>
                            " . $row["Deskripsi"] . "<br>
                            
                        
                   ";
        }
        echo $data; // Mengembalikan data yang telah diformat dalam HTML
    } else {
        echo "Data tidak ditemukan untuk daerah " . $nama_daerah;
    }

    $stmt->close(); // Menutup statement
    $conn->close(); // Menutup koneksi ke database
}
?>
