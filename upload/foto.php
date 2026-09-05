<?php

$uploadedImagePath = ''; // Variabel untuk menyimpan path gambar

if (isset($_POST['submit'])) {
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        
        $fileTmpPath = $_FILES['gambar']['tmp_name'];
        $fileName    = $_FILES['gambar']['name'];
        $fileSize    = $_FILES['gambar']['size'];

        // 1. Bersihkan nama file & cek ekstensi
        $fileNameClean = basename($fileName);
        $fileExtension = strtolower(pathinfo($fileNameClean, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileExtension, $allowedExtensions)) {
            
            // 2. Cek ukuran file (maksimal 2MB)
            if ($fileSize <= 2 * 1024 * 1024) {
                
                $uploadDir = 'upload/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // 3. Buat nama unik agar tidak bentrok
                $newFileName = uniqid('img_', true) . '.' . $fileExtension;
                $destination = $uploadDir . $newFileName;

                // 4. Pindahkan file & simpan path-nya untuk ditampilkan
                if (move_uploaded_file($fileTmpPath, $destination)) {
                    $uploadedImagePath = $destination; // Simpan lokasi gambar
                } else {
                    echo "<p style='color:red;'>Gagal memindahkan file.</p>";
                }

            } else {
                echo "<p style='color:red;'>Ukuran file terlalu besar (Maksimal 2MB).</p>";
            }

        } else {
            echo "<p style='color:red;'>Format file tidak valid! Hanya diperbolehkan JPG, JPEG, PNG, GIF, atau WEBP.</p>";
        }

    } else {
        echo "<p style='color:red;'>Pilih file terlebih dahulu.</p>";
    }
}

?>

<!-- Form Upload -->
<form action="foto.php" method="post" enctype="multipart/form-data">
    <input type="file" name="gambar" accept="image/*" required>
    <input type="submit" name="submit" value="Upload">
</form>

<!-- Menampilkan Gambar Setelah Upload -->
<?php if (!empty($uploadedImagePath)): ?>
    <div style="margin-top: 20px;">
        <h3>Gambar Berhasil Diunggah:</h3>
        <img src="<?php echo htmlspecialchars($uploadedImagePath); ?>" alt="Hasil Upload" style="max-width: 300px; height: auto; border: 1px solid #ccc; padding: 5px; border-radius: 5px;">
    </div>
<?php endif; ?>