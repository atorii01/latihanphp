<?php
require 'auth.php';
cek_login(); // Middleware memproteksi halaman ini
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
    <p>Ini adalah halaman dashboard yang terlindungi.</p>
    <ul>
        <li><a href="profile.php">Atur Profil & Avatar</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>