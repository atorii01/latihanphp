<?php
$a = 1;
$jumlahbeli = 3;
$hargabuah = 10000;
$totalharga = 0;

while ($a <= $jumlahbeli) {
    $totalharga += $hargabuah;
    $a++;
};

echo "$totalharga";


