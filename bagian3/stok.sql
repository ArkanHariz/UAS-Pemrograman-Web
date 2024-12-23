-- membuat database
CREATE DATABASE stok;

-- membuat tabel pada database stok
CREATE TABLE barang (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nomor_seri VARCHAR(50) NOT NULL UNIQUE,
    nama_barang VARCHAR(50) NOT NULL,
    harga VARCHAR(50) NOT NULL,
    browser VARCHAR(255) NULL,
    ip_address VARCHAR(45) NULL
);