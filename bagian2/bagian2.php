<?php
// Definisi kelas Database dan Barang
class Database {
    private $hostname = "localhost:3308";
    private $username = "root";
    private $password = "";
    private $database = "stok";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Cannot connect to database");
        }
    }
}

class Barang {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllBarang($search = "") {
        $query = "SELECT * FROM barang";
        if (!empty($search)) {
            $query .= " WHERE nama_barang LIKE '%$search%'";
        }
        $query .= " ORDER BY id ASC";
        return mysqli_query($this->db, $query);
    }

    public function getBarangById($id) {
        $query = "SELECT * FROM barang WHERE id = '$id'";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result);
    }

    public function insertBarang($nomor_seri, $nama_barang, $harga, $browser, $ip_address) {
        $query = "INSERT INTO barang (nomor_seri, nama_barang, harga, browser, ip_address) VALUES ('$nomor_seri', '$nama_barang', '$harga', '$browser', '$ip_address')";
        return mysqli_query($this->db, $query);
    }

    public function updateBarang($id, $nomor_seri, $nama_barang, $harga, $browser, $ip_address) {
        $query = "UPDATE barang SET nomor_seri = '$nomor_seri', nama_barang = '$nama_barang', harga = '$harga', browser = '$browser', ip_address = '$ip_address' WHERE id = '$id'";
        return mysqli_query($this->db, $query);
    }

    public function deleteBarang($id) {
        $query = "DELETE FROM barang WHERE id = '$id'";
        return mysqli_query($this->db, $query);
    }
}

// Inisialisasi Objek
$barang = new Barang();
$success = "";
$error = "";

// Variabel Input
$nomor_seri = "";
$nama_barang = "";
$harga = "";

// Ambil informasi jenis browser dan alamat IP pengguna
$browser = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

// Operasi CRUD
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    if ($barang->deleteBarang($id)) {
        $success = "Berhasil hapus data";
    } else {
        $error = "Gagal hapus data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $result = $barang->getBarangById($id);
    if ($result) {
        $nomor_seri = $result['nomor_seri'];
        $nama_barang = $result['nama_barang'];
        $harga = $result['harga'];
    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $nomor_seri = trim($_POST['serial_number'] ?? '');
    $nama_barang = trim($_POST['stock_name'] ?? '');
    $harga = trim($_POST['price'] ?? '');

    if ($nomor_seri && $nama_barang && $harga) {
        if ($op == 'edit') {
            $id = $_GET['id'];
            if ($barang->updateBarang($id, $nomor_seri, $nama_barang, $harga, $browser, $ip_address)) {
                $success = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            if ($barang->insertBarang($nomor_seri, $nama_barang, $harga, $browser, $ip_address)) {
                $success = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan data yang valid";
    }
}

$search = trim($_POST['search'] ?? ''); // Tangani pencarian dari input
$barang_data = $barang->getAllBarang($search); // Mengambil data barang
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="bagian2.css">
</head>
<body>
    <div class="mx-auto">
        <!-- Card untuk Pencarian -->
        <div class="card">
            <div class="card-header">Cari Barang</div>
            <div class="card-body">
                <form id="search-form" method="POST">
                    <div class="mb-3 row">
                        <label for="search" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Masukkan nama barang">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Card untuk Input Data -->
        <div class="card">
            <div class="card-header">Create / Edit Data</div>
            <div class="card-body">
                <?php if ($error) { ?>
                    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                <?php } ?>
                <?php if ($success) { ?>
                    <div class="alert alert-success" role="alert"><?php echo $success ?></div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="serial_number" class="col-sm-2 col-form-label">Nomor Seri</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?php echo htmlspecialchars($nomor_seri) ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stock_name" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock_name" name="stock_name" value="<?php echo htmlspecialchars($nama_barang) ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($harga) ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <!-- Card untuk Menampilkan Data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">Data Stok Barang</div>
            <div class="card-body">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Seri</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sort = 1;
                        while ($row = mysqli_fetch_array($barang_data)) {
                            ?>
                            <tr>
                                <th><?php echo $sort++ ?></th>
                                <td><?php echo htmlspecialchars($row['nomor_seri']) ?></td>
                                <td><?php echo htmlspecialchars($row['nama_barang']) ?></td>
                                <td><?php echo htmlspecialchars($row['harga']) ?></td>
                                <td>
                                    <a href="bagian2.php?op=edit&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="bagian2.php?op=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Yakin mau hapus data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>