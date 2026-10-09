<?php
// koneksi.php - Menghubungkan aplikasi ke database MySQL
$host     = "localhost";
$username = "root";
$password = "";
$database = "db_sekolah";

// Koneksi menggunakan mysqli dengan penanganan error
$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set karakter encoding
mysqli_set_charset($koneksi, "utf8mb4");
?>
