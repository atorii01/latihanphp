<?php
require_once 'cookie_helper.php';

// Ambil ID produk dari URL, contoh: product.php?id=102
$product_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($product_id) {
    add_recently_viewed($product_id);
    echo "Produk dengan ID <b>$product_id</b> berhasil dicatat ke cookie!<br>";
} else {
    echo "ID Produk tidak ditemukan.<br>";
}
?>

<a href="index.php">Kembali ke Halaman Utama</a>