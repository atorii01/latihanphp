<?php
session_start();

$db_file = 'users.json';

// Inisialisasi file JSON jika belum ada
if (!file_exists($db_file)) {
    file_put_contents($db_file, json_encode([]));
}

// ==========================================
// FUNGSI SIMULASI DATABASE (JSON)
// ==========================================
function get_users() {
    global $db_file;
    $data = file_get_contents($db_file);
    return json_decode($data, true) ?? [];
}

function save_users($users) {
    global $db_file;
    file_put_contents($db_file, json_encode($users, JSON_PRETTY_PRINT));
}

// ==========================================
// A. MIDDLEWARE & AUTO-LOGIN
// ==========================================
function cek_login() {
    // 1. Jika sesi sudah ada
    if (isset($_SESSION['user_id'])) {
        return true;
    }

    // 2. Jika tidak ada sesi, cek cookie Remember Me
    if (isset($_COOKIE['remember_me'])) {
        $parts = explode(':', $_COOKIE['remember_me']);
        if (count($parts) === 2) {
            list($selector, $validator) = $parts;
            
            $users = get_users();
            foreach ($users as $user) {
                if (isset($user['remember_selector']) && $user['remember_selector'] === $selector) {
                    $cookie_hash = hash('sha256', $validator);
                    
                    // Validasi token
                    if (hash_equals($user['remember_validator_hash'], $cookie_hash)) {
                        session_regenerate_id(true);
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        return true;
                    }
                }
            }
        }
    }

    // Jika semua gagal, redirect ke login
    header("Location: login.php");
    exit();
}
?>