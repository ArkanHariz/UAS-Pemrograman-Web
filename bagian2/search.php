<?php
$hostname = "localhost:3308";
$username = "root";
$password = "";
$database = "stok";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Cannot connect to database");
}

$search = trim($_POST['search'] ?? '');

$sql2 = "SELECT * FROM barang";
if (!empty($search)) {
    $sql2 .= " WHERE nama_barang LIKE '%$search%'";
}
$sql2 .= " ORDER BY id ASC";

$q2 = mysqli_query($conn, $sql2);

echo '<table class="table">';
echo '<thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nomor Seri</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
        </tr>
      </thead>';
echo '<tbody>';
$sort = 1;

while ($r2 = mysqli_fetch_array($q2)) {
    $id = $r2['id'];
    $nomor_seri = htmlspecialchars($r2['nomor_seri']);
    $nama_barang = htmlspecialchars($r2['nama_barang']);
    $harga = htmlspecialchars($r2['harga']);
    echo '<tr>
            <th scope="row">' . $sort++ . '</th>
            <td>' . $nomor_seri . '</td>
            <td>' . $nama_barang . '</td>
            <td>' . $harga . '</td>
            <td>
                <a href="bagian2.php?op=edit&id=' . $id . '"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="bagian2.php?op=delete&id=' . $id . '" onclick="return confirm(\'Yakin mau hapus data ?\')"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
          </tr>';
}
echo '</tbody>';
echo '</table>';
?>