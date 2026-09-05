<?php

$hargabarang = 150000;
$persenpajak = 0.1;

function hitungpajak() {
    global $hargabarang, $persenpajak;
$total = $hargabarang * $persenpajak;
    return $total;
}
echo "Pajak yang harus dibayar: " . hitungpajak();