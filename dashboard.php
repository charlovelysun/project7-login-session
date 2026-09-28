<?php
session_start();


if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proyek 7 - Dashboard Terproteksi</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 40px; }
        .card { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .btn-logout { display: inline-block; padding: 10px 15px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; margin-top: 15px; }
        .btn-logout:hover { background-color: #c82333; }
    </style>
</head>
<body>

<div class="card">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['user']); ?>!</h2>
    <p>Ini adalah halaman <strong>Dashboard Utama</strong> yang hanya bisa diakses setelah berhasil melalui proses verifikasi login.</p>
    
    <a href="logout.php" class="btn-logout" onclick="return confirm('Yakin ingin keluar?')">Logout</a>
</div>

</body>
</html>