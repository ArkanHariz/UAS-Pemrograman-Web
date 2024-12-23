<?php
// Memulai session
session_start();

// Menghapus semua session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Session</title>
</head>
<body>
    <h1>Session Telah Dihapus</h1>
    <p>Semua data session telah dihapus.</p>
    <a href="session_start.php">Kembali ke Halaman Awal</a>
</body>
</html>
