<?php

$nilai_rata = 85;
$kehadarian = 100;
$sertifikat_provinsi = false;

if ($nilai_rata >= 85 && $kehadarian == 100 || $sertifikat_provinsi) {
    echo "Selamat! Anda mendapatkan beasiswa.";

} else {
    echo "Maaf, Anda tidak lulus seleksi beasiswa.";
}

?>