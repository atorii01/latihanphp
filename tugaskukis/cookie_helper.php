<?php
// Fungsi untuk menyimpan cookie (default 30 hari)
function set_user_cookie($name, $value, $days = 30) {
    setcookie($name, $value, time() + ($days * 24 * 60 * 60), "/");
}

// Fungsi untuk mengambil cookie dengan nilai default
function get_user_cookie($name, $default = '') {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default;
}

// Fungsi untuk menyimpan ID produk terakhir dilihat (maksimal 5 produk)
function add_recently_viewed($product_id) {
    $recent = get_user_cookie('recently_viewed', '');
    $items = $recent ? explode(',', $recent) : [];

    // Hapus jika ID sudah ada (agar tidak duplikat) lalu taruh di urutan paling depan
    if (($key = array_search($product_id, $items)) !== false) {
        unset($items[$key]);
    }
    array_unshift($items, $product_id);

    // Simpan maksimal 5 produk terakhir
    $items = array_slice($items, 0, 5);
    set_user_cookie('recently_viewed', implode(',', $items));
}
?>