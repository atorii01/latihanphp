<?php
require 'auth.php';
cek_login();

$pesan = '';

// Bikin folder uploads jika belum ada
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];

    // Layer 1: Validasi Error
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $pesan = "Upload gagal. Kode error: " . $file['error'];
    } 
    // Layer 2: Ukuran (Maks 2MB)
    elseif ($file['size'] > (2 * 1024 * 1024)) {
        $pesan = "Ukuran gambar maksimal 2 MB.";
    } 
    else {
        // Layer 3 & 4: Validasi MIME Asli
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        $allowed_mimes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($mime_type, $allowed_mimes, true)) {
            $pesan = "Format tidak didukung! Hanya JPG, PNG, atau WEBP.";
        } else {
            // Ekstensi aman
            $ekstensi = image_type_to_extension(exif_imagetype($file['tmp_name']));
            // Nama file unik
            $nama_file_baru = 'avatar_' . bin2hex(random_bytes(8)) . $ekstensi;
            $tujuan = 'uploads/' . $nama_file_baru;

            if (move_uploaded_file($file['tmp_name'], $tujuan)) {
                $pesan = "Avatar berhasil diperbarui menjadi: " . $nama_file_baru;
            } else {
                $pesan = "Gagal memindahkan file.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Profil Anda</h2>
    <p style="color:blue;"><?= $pesan ?></p>
    
    <form method="POST" enctype="multipart/form-data">
        <label>Upload Foto Profil Baru:</label><br><br>
        <!-- Layer Tambahan di Frontend -->
        <input type="file" name="avatar" accept="image/png, image/jpeg, image/webp" required><br><br>
        <button type="submit">Upload Avatar</button>
    </form>
    
    <br>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>