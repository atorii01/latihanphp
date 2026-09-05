<?php
include 'koneksi.php';

// Ambil data
$id     = null;
$nama   = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_telp'];
$email = $_POST['email'];

// Simpan data
mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$id', '$nama', '$alamat','$no_tlp', '$email')");
echo "<h3>Data Tersimpan!</h3>";

// Tampilkan data dengan WHILE
$ambil = mysqli_query($conn, "SELECT * FROM mahasiswa");
echo "<table border='1'>
        <tr><th>id</th><th>Nama</th><th>Alamat</th><th>no telp</th><th>email</th></tr>";

$id = 1;
while ($row = mysqli_fetch_array($ambil)) {
    echo "<tr>
            <td>$id</td>
            <td>{$row['nama']}</td>
            <td>{$row['alamat']}</td>
            <td>{$row['no_telp']}</td>
            <td>{$row['email']}</td>
          </tr>";
    $id++;
}
echo "</table>";

// Contoh FOR (Menghitung total data yang ada)
echo "<br>Riwayat entri: ";
for ($i = 1; $i < $id; $i++) {
    echo "[$i] ";
}

echo "<br><br><a href='form.html'>Kembali</a>";
?>
