<?php
include 'koneksi.php';

$id = $_GET['id'] ?? '';
if ($id) {
  $conn->query("DELETE FROM barang WHERE id = $id");
}

header("Location: index.php");
exit;