<?php

session_start();

$_SESSION['user_id'] = 101;
$_SESSION['username'] = 'john_doe';
$_SESSION['role'] = 'admin';

echo "Data session telah disimpan. <a href='index.php'>Kembali ke halaman utama</a>";