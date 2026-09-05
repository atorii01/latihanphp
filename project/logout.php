<?php
require 'auth.php';
session_start();

// Hapus isi array sesi
$_SESSION = array();

// Hancurkan sesi di server
session_destroy();

// Hapus Cookie dari browser
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', [
        'expires' => time() - 3600, // Set waktu lampau
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}

// Catatan: Jika ini SQL, hapus token user di DB juga di sini.
// Karena simulasi, kita cukup hapus cookie dan sessionnya.

header("Location: login.php");
exit();
?>