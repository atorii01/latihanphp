<?php
session_start();

if(!isset($_SESSION['tiket'])){
    header("Location: step1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Step 3</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Ringkasan Pendaftaran</h2>

<p><b>Nama :</b> <?= $_SESSION['nama']; ?></p>

<p><b>Email :</b> <?= $_SESSION['email']; ?></p>

<p><b>Telepon :</b> <?= $_SESSION['telepon']; ?></p>

<p><b>Tiket :</b> <?= $_SESSION['tiket']; ?></p>

<p><b>Workshop :</b></p>

<ul>

<?php
foreach($_SESSION['workshop'] as $w){
    echo "<li>$w</li>";
}
?>

</ul>

<form action="simpan.php" method="post">
<button>Konfirmasi & Simpan</button>
</form>

<br>

<a href="step1.php">Batal / Reset</a>

</body>
</html>