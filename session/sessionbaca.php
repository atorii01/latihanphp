<?php

session_start();

if (isset($_SESSION['username'])) {
    echo "Selamat datang kembali, " . $_SESSION['username'] . htmlspecialchars($_SESSION['username']);
} else {
    echo "Anda belum login.";
}