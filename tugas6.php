<?php

$daftar_murid = [
    ["nama" => "Andi", "nilai" => 80],
    ["nama" => "Budi", "nilai" => 93],
    ["nama" => "Sarah", "nilai" => 75]
];

$kkm = 80;

echo "<h3>Hasil Penilaian Murid</h3>";
echo "<hr>";


foreach ($daftar_murid as $murid) {
    $nama = $murid["nama"];
    $nilai = $murid["nilai"];


    if ($nilai >= $kkm) {
        $status = "LULUS";
    } else {
        $status = "TIDAK LULUS";
    }

    echo "Nama: $nama | Nilai: $nilai | Status: <b>$status</b> <br>";
}
?>