<?php
// Memulai session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Session</title>
</head>
<body>
    <h1>Akses Session</h1>
    <?php if (isset($_SESSION['username']) && isset($_SESSION['email'])): ?>
        <p>Username: <?php echo $_SESSION['username']; ?></p>
        <p>Email: <?php echo $_SESSION['email']; ?></p>
    <?php else: ?>
        <p>Session tidak tersedia. Silakan mulai session terlebih dahulu.</p>
    <?php endif; ?>
    <a href="session_start.php">Kembali</a> |
    <a href="session_destroy.php">Hapus Session</a>
</body>
</html>
