<?php
require_once 'cookie_helper.php';

// 1. Tangani Form Pengaturan Tampilan & Bahasa
if (isset($_POST['save_settings'])) {
    set_user_cookie('theme', $_POST['theme']);
    set_user_cookie('lang', $_POST['lang']);
    header("Location: index.php"); // Refresh halaman
    exit;
}

// 2. Ambil nilai cookie (Default: Light & id)
$theme = get_user_cookie('theme', 'light');
$lang  = get_user_cookie('lang', 'id');

$translations = [
    'id' => [
        'page_title' => 'Toko Online Guest Mode',
        'settings_title' => '1. Pengaturan Tampilan',
        'theme_label' => 'Mode Tampilan',
        'language_label' => 'Bahasa',
        'save_button' => 'Simpan Preferensi',
        'recent_title' => '2. Daftar Produk Terakhir Dilihat',
        'empty_state' => 'Belum ada produk yang dilihat.',
        'simulate_title' => 'Simulasi Buka Produk:',
        'view_product' => 'Lihat Produk',
        'language_id' => 'Bahasa Indonesia',
        'language_en' => 'English',
    ],
    'en' => [
        'page_title' => 'Guest Mode Online Store',
        'settings_title' => '1. Display Settings',
        'theme_label' => 'Display Mode',
        'language_label' => 'Language',
        'save_button' => 'Save Preferences',
        'recent_title' => '2. Recently Viewed Products',
        'empty_state' => 'No products have been viewed yet.',
        'simulate_title' => 'Product Preview Simulation:',
        'view_product' => 'View Product',
        'language_id' => 'Bahasa Indonesia',
        'language_en' => 'English',
    ],
];

$t = $translations[$lang] ?? $translations['id'];

// 3. Ambil daftar produk terakhir dilihat
$recent_cookie = get_user_cookie('recently_viewed', '');
$recent_items  = $recent_cookie ? explode(',', $recent_cookie) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $t['page_title']; ?></title>
    <style>
        body.dark { background-color: #222; color: #fff; }
        body.light { background-color: #fff; color: #000; }
    </style>
</head>
<body class="<?= $theme; ?>">

    <h2><?= $t['settings_title']; ?></h2>
    <form method="POST">
        <label><?= $t['theme_label']; ?>:</label>
        <select name="theme">
            <option value="light" <?= $theme == 'light' ? 'selected' : '' ?>>Light</option>
            <option value="dark" <?= $theme == 'dark' ? 'selected' : '' ?>>Dark</option>
        </select>
        <br><br>
        <label><?= $t['language_label']; ?>:</label>
        <select name="lang">
            <option value="id" <?= $lang == 'id' ? 'selected' : '' ?>><?= $t['language_id']; ?></option>
            <option value="en" <?= $lang == 'en' ? 'selected' : '' ?>><?= $t['language_en']; ?></option>
        </select>
        <br><br>
        <button type="submit" name="save_settings"><?= $t['save_button']; ?></button>
    </form>

    <hr>

    <h2><?= $t['recent_title']; ?></h2>
    <?php if (!empty($recent_items)): ?>
        <ul>
            <?php foreach ($recent_items as $id): ?>
                <li><?= $t['view_product']; ?> ID: <?= $id; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p><?= $t['empty_state']; ?></p>
    <?php endif; ?>

    <hr>
    <h3><?= $t['simulate_title']; ?></h3>
    <a href="product.php?id=101"><?= $t['view_product']; ?> 101</a> | 
    <a href="product.php?id=102"><?= $t['view_product']; ?> 102</a> | 
    <a href="product.php?id=103"><?= $t['view_product']; ?> 103</a>

</body>
</html>