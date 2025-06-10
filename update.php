<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$kategori = $_POST['kategori'];

$sql = "UPDATE barang SET nama=?, jumlah=?, kategori=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sisi", $nama, $jumlah, $kategori, $id);
$stmt->execute();

header("Location: index.php");
exit;