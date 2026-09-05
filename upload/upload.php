<?php

if (isset($_POST['submit'])){
    print_r($_FILES);

    $nama = $_FILES['gambar']['name'];
    $asal = $_FILES['gambar']['tmp_name'];
    $tujuan = 'upload/' . $nama;

    if (move_uploaded_file($asal, $tujuan)){
        echo "<h2> upload berhasil </h2>";
        echo "<p> nama file : <b> $nama </b> </p>";
        echo "<img src='$tujuan' width='300'>";
    }
    else{
        echo "gagal upload";
    }
}

?>

<form action="foto.php" method="post" enctype="multipart/form-data">
    <input type="file" name="gambar">
    <input type="submit" name="submit" value="uplaod">
</form>