<?php

$namabuah = "apel";
$jumlahbeli = "10x";

switch ($namabuah) {
    case "apel";
        $harga = 20000;
    break;
    case "mangga";
        $harga = 25000;
    break;
    case "jeruk";
        $harga = 15000;
    break;
    default;
        echo "error";
    break;
}

$total = $harga * $jumlahbeli;

    echo "<h1> $harga x $jumlahbeli = $total<h1>";
