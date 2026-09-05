<?php
// Mengambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST['komentar'];

// Jumlah karakter sebelum trim
$panjangSebelum = strlen($komentar);

// Menghapus spasi di awal dan akhir
$komentarTrim = trim($komentar);

// Jumlah karakter sesudah trim
$panjangSesudah = strlen($komentarTrim);

// Menghapus tag HTML
$komentarBersih = strip_tags($komentarTrim);

// Menampilkan tanggal dan waktu
$tanggal = date("d-m-Y H:i:s");

// Output
echo "<h2>Hasil Data</h2>";
echo "Nama : $nama <br>";
echo "Email : $email <br>";
echo "Komentar : $komentarBersih <br>";
echo "Tanggal : $tanggal <br><br>";

echo "<h3>Perbandingan Karakter</h3>";
echo "Sebelum trim : $panjangSebelum karakter <br>";
echo "Sesudah trim : $panjangSesudah karakter";
?>