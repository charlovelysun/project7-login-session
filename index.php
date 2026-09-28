<?php
session_start();


if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";


$username_valid = "admin";
$password_valid = "12345";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Username dan Password wajib diisi!";
    } elseif ($username === $username_valid && $password === $password_valid) {

        $_SESSION['login'] = true;
        $_SESSION['user']  = $username;


        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proyek 7 - Login Hardcoded</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { width: 350px; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .alert { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px; }
        .info-box { background: #e2e3e5; color: #383d41; padding: 8px; border-radius: 4px; font-size: 12px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Login Sistem</h2>

    <div class="info-box">
        <strong>Demo Akun:</strong><br>
        Username: admin<br>
        Password: 12345
    </div>

    <?php if ($error): ?>
        <div class="alert"><?= $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" required placeholder="Masukkan username">
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required placeholder="Masukkan password">
        </div>

        <button type="submit" name="login">Masuk</button>
    </form>
</div>

</body>
</html>