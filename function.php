<?php

$nama = "peter";

function bilangHalo() {
    echo "Halo";
}

function bilangNama($nama) {
    echo "Halo, " . $nama . '!<br/>';
}

function tambah($a, $b) {
    $total = $a + $b;
    echo $total;
}

bilangHalo();
echo "<br>";
bilangNama("Peter");  
tambah(10,10); 