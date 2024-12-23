<?php
// Koneksi ke database
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Validasi input (jika diperlukan)
    if (empty($user) || empty($email) || empty($pass)) {
        echo "Please fill all fields.";
    } else {
        // Cek apakah email sudah terdaftar
        $emailCheck = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $emailCheck->bind_param("s", $email);
        $emailCheck->execute();
        $result = $emailCheck->get_result();

        if ($result->num_rows > 0) {
            echo "Email is already taken.";
        } else {
            // Menggunakan prepared statement untuk menghindari SQL injection
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $user, $email, $pass); // Simpan password tanpa di-hash

            if ($stmt->execute()) {
                // Redirect ke tampil.php setelah berhasil insert
                echo '<script>alert("Successfully Registered"); window.location.href = "1.1_tampil.php";</script>';
                // header("Location: 1.1_tampil.php");
                exit(); // Jangan lupa exit setelah header redirect
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
        $emailCheck->close();
    }
}

$conn->close();
?>