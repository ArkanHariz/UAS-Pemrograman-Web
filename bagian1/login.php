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

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    // Return a JSON response indicating success
    echo json_encode(['success' => true]);
} else {
    // Return a JSON response indicating failure
    echo json_encode(['success' => false, 'message' => 'Username, email, or password is incorrect.']);
}

?>