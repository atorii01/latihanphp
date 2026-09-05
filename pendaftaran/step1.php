<?php
session_start();

$error = "";

if(isset($_POST['next'])){
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);

    if(empty($nama) || empty($email) || empty($telepon)){
        $error = "Semua field wajib diisi!";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = "Email tidak valid!";
    }else{
        $_SESSION['nama']=$nama;
        $_SESSION['email']=$email;
        $_SESSION['telepon']=$telepon;

        header("Location: step2.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Step 1</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Langkah 1 - Data Diri</h2>

<p style="color:red;"><?= $error ?></p>

<form method="post">
Nama Lengkap <br>
<input type="text" name="nama"><br><br>

Email <br>
<input type="email" name="email"><br><br>

Nomor Telepon <br>
<input type="text" name="telepon"><br><br>

<button name="next">Selanjutnya</button>
</form>

</body>
</html>