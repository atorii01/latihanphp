<?php
// register.php - Tampilan Form Pendaftaran Akun
$status  = isset($_GET['status']) ? $_GET['status'] : '';
$pesan   = isset($_GET['pesan']) ? htmlspecialchars($_GET['pesan']) : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pengguna Baru - SMK</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #fff; width: 100%; max-width: 420px; padding: 25px 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #1a5276; margin-bottom: 20px; }
        .alert { padding: 12px 15px; border-radius: 4px; margin-bottom: 18px; font-size: 14px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; color: #333; font-size: 14px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
        input:focus { border-color: #2874a6; outline: none; }
        .btn-submit { width: 100%; background-color: #1a5276; color: white; border: none; padding: 12px; font-size: 15px; font-weight: bold; border-radius: 4px; cursor: pointer; transition: 0.2s; }
        .btn-submit:hover { background-color: #154360; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Pendaftaran Akun</h2>

        <?php if ($status === 'sukses'): ?>
            <div class="alert alert-success"><?= $pesan; ?></div>
        <?php elseif ($status === 'gagal'): ?>
            <div class="alert alert-danger"><?= $pesan; ?></div>
        <?php endif; ?>

        <form action="proses_daftar.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap siswa" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
            <button type="submit" name="submit" class="btn-submit">Daftar Sekarang</button>
        </form>
    </div>
</body>
</html>
