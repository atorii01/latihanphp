<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username     = trim($_POST['username']);
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $password_raw = $_POST['password'];

    // Cek jika ada input yang kosong
    if (empty($username) || empty($nama_lengkap) || empty($password_raw)) {
        header("Location: register.php?status=empty");
        exit();
    }

    $username_clean = strtolower($username);

    $query_check = "SELECT id FROM users WHERE LOWER(username) = ?";
    $stmt_check  = mysqli_prepare($koneksi, $query_check);
    mysqli_stmt_bind_param($stmt_check, "s", $username_clean);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        mysqli_stmt_close($stmt_check);
        header("Location: register.php?status=duplicate");
        exit();
    }
    mysqli_stmt_close($stmt_check);

    $password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

    $query_insert = "INSERT INTO users (username, nama_lengkap, password) VALUES (?, ?, ?)";
    $stmt_insert  = mysqli_prepare($koneksi, $query_insert);
    mysqli_stmt_bind_param($stmt_insert, "sss", $username_clean, $nama_lengkap, $password_hashed);

    if (mysqli_stmt_execute($stmt_insert)) {
        // Berhasil disimpan
        mysqli_stmt_close($stmt_insert);
        header("Location: register.php?status=success");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
} else {
    header("Location: register.php");
    exit();
}
?>