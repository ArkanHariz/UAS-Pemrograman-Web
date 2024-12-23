<?php
// Koneksi ke database
$servername = "localhost:3308";
$username = "root";
$password = ""; 
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data users
$sql = "SELECT username, email, password FROM users";
$result = $conn->query($sql);

// Mengubah hasil query menjadi array
$users = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        .container {
            text-align: center;
        }

    </style>
</head>
<body>

    <h1>Tabel Data Users</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <?php foreach ($users as $key => $row): ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="container">
        <button onclick="window.location.href='1.1_form_input.html';">Kembali ke Sign Up</button>
        <button onclick="window.location.href='1.2_event_handling.html';">Lanjut Login</button>
    </div>

    <?php $conn->close(); ?>
</body>
</html>