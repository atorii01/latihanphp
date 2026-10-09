<?php
// proses_daftar.php - Logika Pengecekan, Sanitasi, dan Penyimpanan
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Ambil input form dan bersihkan spasi awal/akhir dengan trim()
    $raw_username = trim($_POST['username'] ?? '');
    $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
    $password     = trim($_POST['password'] ?? '');

    // Validasi field tidak boleh kosong
    if (empty($raw_username) || empty($nama_lengkap) || empty($password)) {
        header("Location: register.php?status=gagal&pesan=" . urlencode("Semua kolom formulir wajib diisi!"));
        exit();
    }

    // 2. Normalisasi username ke huruf kecil (Case-Insensitive Rule)
    // Contoh: 'Budi', 'BUDI', 'budi' semuanya diolah menjadi 'budi'
    $username = strtolower($raw_username);

    // 3. Pengecekan Ketersediaan Username Menggunakan PREPARED STATEMENT
    $query_cek = "SELECT id FROM users WHERE username = ? LIMIT 1";
    $stmt_cek = mysqli_prepare($koneksi, $query_cek);

    if (!$stmt_cek) {
        die("Query error: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt_cek, "s", $username);
    mysqli_stmt_execute($stmt_cek);
    mysqli_stmt_store_result($stmt_cek);

    // 4. Pengambilan Keputusan (Decision Making)
    if (mysqli_stmt_num_rows($stmt_cek) > 0) {
        // Username SUDAH DIGUNAKAN
        mysqli_stmt_close($stmt_cek);
        header("Location: register.php?status=gagal&pesan=" . urlencode("Username '{$raw_username}' sudah terdaftar! Silakan gunakan username lain."));
        exit();
    }
    mysqli_stmt_close($stmt_cek);

    // 5. Hash Password demi keamanan (Best Practice Keamanan Web)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // 6. Simpan Pengguna Baru ke Database dengan Prepared Statement
    $query_insert = "INSERT INTO users (username, nama_lengkap, password) VALUES (?, ?, ?)";
    $stmt_insert = mysqli_prepare($koneksi, $query_insert);

    if (!$stmt_insert) {
        die("Query error: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt_insert, "sss", $username, $nama_lengkap, $password_hash);

    if (mysqli_stmt_execute($stmt_insert)) {
        mysqli_stmt_close($stmt_insert);
        header("Location: register.php?status=sukses&pesan=" . urlencode("Pendaftaran berhasil! Akun '{$username}' telah siap digunakan."));
        exit();
    } else {
        mysqli_stmt_close($stmt_insert);
        header("Location: register.php?status=gagal&pesan=" . urlencode("Terjadi kendala saat menyimpan data ke server."));
        exit();
    }
} else {
    // Jika diakses langsung tanpa POST method
    header("Location: register.php");
    exit();
}
?>
