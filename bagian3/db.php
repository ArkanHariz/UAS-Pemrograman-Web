<?php
class Connection {
    private $hostname = 'localhost:3308';
    private $username = 'root';
    private $password = '';
    private $database = 'stok';
    public $conn;

    // Konstruktor untuk membuat koneksi
    public function __construct() {
        $this->conn = new mysqli(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database
        );

        // Memeriksa apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }
    }

    // Method untuk mendapatkan koneksi
    public function getConnection() {
        return $this->conn;
    }
}

class Barang extends Connection {

    // Method untuk mengambil data barang dari database
    public function getBarang() {
        $conn = $this->getConnection(); // Mendapatkan koneksi
        $sql = "SELECT * FROM barang"; // Ganti dengan nama tabel yang sesuai
        $result = $conn->query($sql); // Eksekusi query

        // Menambahkan CSS untuk styling
        echo "
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
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
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
            td {
                text-align: center;
            }
        </style>
        ";

        // Menampilkan data dalam format tabel HTML
        echo "<table>";
        echo "<tr><th>Nomor Seri</th><th>Nama Barang</th><th>Harga</th></tr>"; // Sesuaikan dengan kolom tabel Anda

        // Mengecek apakah ada data dan menampilkannya
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nomor_seri'] . "</td>"; // Ganti dengan nama kolom yang sesuai
                echo "<td>" . $row['nama_barang'] . "</td>"; // Ganti dengan nama kolom yang sesuai
                echo "<td>" . $row['harga'] . "</td>"; // Ganti dengan nama kolom yang sesuai
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }

        echo "</table>";
    }
}

// Membuat objek dari kelas Barang dan menampilkan data
$barang = new Barang();
$barang->getBarang();
?>