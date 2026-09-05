<?php
require 'auth.php';

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi_password'];

    // Validasi
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan = "Format email tidak valid.";
    } elseif (strlen($password) < 8) {
        $pesan = "Password minimal 8 karakter.";
    } elseif ($password !== $konfirmasi) {
        $pesan = "Password dan Konfirmasi tidak cocok.";
    } else {
        $users = get_users();
        
        // Cek email duplikat
        $email_terpakai = false;
        foreach ($users as $u) {
            if ($u['email'] === $email) $email_terpakai = true;
        }

        if ($email_terpakai) {
            $pesan = "Email sudah terdaftar!";
        } else {
            // Simpan User Baru
            $users[] = [
                'id' => uniqid(),
                'username' => htmlspecialchars($username),
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'avatar' => 'default.png'
            ];
            save_users($users);
            $pesan = "Registrasi berhasil! Silakan <a href='login.php'>Login</a>.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Register</h2>
    <p style="color:red;"><?= $pesan ?></p>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password (Min 8 Karakter)" required><br><br>
        <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required><br><br>
        <button type="submit">Daftar</button>
    </form>
    <a href="login.php">Sudah punya akun? Login</a>
</body>
</html>