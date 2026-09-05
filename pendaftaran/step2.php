<?php
session_start();

if(!isset($_SESSION['nama'])){
    header("Location: step1.php");
    exit;
}

if(isset($_POST['next'])){

    $_SESSION['tiket']=$_POST['tiket'];

    if(isset($_POST['workshop'])){
        $_SESSION['workshop']=$_POST['workshop'];
    }else{
        $_SESSION['workshop']=[];
    }

    header("Location: step3.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Step 2</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Langkah 2 - Tiket & Workshop</h2>

<form method="post">

<h3>Tipe Tiket</h3>

<text>Regular</text> <input type="radio" name="tiket" value="Regular" checked>
<text>VIP</text> <input type="radio" name="tiket" value="VIP">

<h3>Workshop</h3>

<input type="checkbox" name="workshop[]" value="PHP Security">
<text>PHP Security</text><br>

<input type="checkbox" name="workshop[]" value="Laravel Masterclass">
<text>Laravel Masterclass</text><br>

<input type="checkbox" name="workshop[]" value="Database Optimization">
<text>Database Optimization</text><br><br>

<button name="next">Selanjutnya</button>

</form>

</body>
</html>