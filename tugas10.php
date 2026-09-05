<?php
function hargabarang($jumlah, $harga_satuan) {
    $total = $jumlah * $harga_satuan;
    $diskon = $total * 0.9;
    return $total;
}
echo "Total harga barang: " . hargabarang(3, 15000000);

?>l