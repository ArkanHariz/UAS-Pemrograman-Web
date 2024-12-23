<?php
// Memulai session
session_start();

// Menyimpan informasi pengguna ke dalam session
$_SESSION['username'] = 'JohnDoe';
$_SESSION['email'] = 'johndoe@example.com';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Start</title>
</head>
<body>
    <h1>Session Telah Disimpan</h1>
    <p>Username: <?php echo $_SESSION['username']; ?></p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <a href="session_access.php">Akses Session</a> |
    <a href="session_destroy.php">Hapus Session</a>
</body>
</html>
