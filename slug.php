<?php
$title = "coding php";

echo "Judul: " . $title;
echo "<br><br>";

$arrayKata = explode(" ", $title);

echo "<b>Hasil explode():</b><br>";
print_r($arrayKata);

echo "<br><br>";

$arrayKecil = array_map('strtolower', $arrayKata);

echo "<b>Setelah strtolower():</b><br>";
print_r($arrayKecil);

echo "<br><br>";

$slug = implode("-", $arrayKecil);

echo "<b>Hasil implode():</b><br>";
echo $slug;