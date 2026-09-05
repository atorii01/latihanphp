<?php

$produk = ["nama barang"    => "handphone", "merek" => "Samsung", "tipe" => "Galaxy S21", "harga" => 15000000];

foreach ($produk as $key => $value) {
    echo "key: " . $key . " => Detail: " . $value . "<br>";
}