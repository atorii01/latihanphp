<?php

$namabuah = ["Tomat", "Jeruk", "Apel"];

echo "<h3>INI A (FOR)</h3>";
for ($a = 0; $a < count($namabuah); $a++) {
    echo "index ke $a : ".$namabuah[$a]."<br>";
}

echo "<h3>INI B (FOREACH)</h3>";
foreach ($namabuah as $index => $namabuah) {
    echo "Index ke $index:" .$namabuah. "<br>";
}



