<?php
require 'auth.php';

// Jika sudah login, lempar ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    $users = get_users();
    $login_sukses = false;

    foreach ($users as $index => $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            
            // Cegah Session Fixation
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Logika Remember Me
            if ($remember_me) {
                $selector = bin2hex(random_bytes(16));
                $validator = bin2hex(random_bytes(32));
                
                $users[$index]['remember_selector'] = $selector;
                $users[$index]['remember_validator_hash'] = hash('sha256', $validator);
                save_users($users); // Update JSON

                $token = $selector . ':' . $validator;
                setcookie('remember_me', $token, [
                    'expires' => time() + (30 * 24 * 60 * 60),
                    'path' => '/',
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
            }

            $login_sukses = true;
            header("Location: dashboard.php");
            exit();
        }
    }

    if (!$login_sukses) {
        $pesan = "Email atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Login</h2>
    <p style="color:red;"><?= $pesan ?></p>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <label>
            <input type="checkbox" name="remember_me"> Ingat Saya
        </label><br><br>
        <button type="submit">Login</button>
    </form>
    <a href="register.php">Belum punya akun? Daftar</a>
</body>
</html>