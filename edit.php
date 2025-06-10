<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? '';
if (!$id) {
  header('Location: index.php');
  exit;
}

// Ambil data barang berdasarkan ID
$sql = "SELECT * FROM barang WHERE id = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="light"> <!-- Default ke light mode -->
<head>
  <meta charset="UTF-8">
  <title>Edit Data Barang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      transition: background-color 0.3s, color 0.3s;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .btn-toggle {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 999;
    }
  </style>
</head>
<body>
<div class="container py-5">
  <!-- Toggle Dark Mode -->
  <button id="themeToggle" class="btn btn-sm btn-outline-secondary btn-toggle">🌓</button>

  <h2 class="mb-4 text-center">🖊️ Edit Data Barang</h2>

  <!-- Form Edit -->
  <form action="update.php" method="post" class="row g-3 mb-4">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="col-md-4">
      <input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>
    <div class="col-md-3">
      <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?= htmlspecialchars($data['jumlah']) ?>" required>
    </div>
    <div class="col-md-3">
      <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="<?= htmlspecialchars($data['kategori']) ?>" required>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
  </form>

  <!-- Kembali ke Data Barang -->
  <div class="text-center">
    <a href="index.php" class="btn btn-outline-info">← Kembali ke Data Barang</a>
  </div>
</div>

<!-- Bootstrap & Dark Mode Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const toggleBtn = document.getElementById('themeToggle');
  const htmlEl = document.documentElement;

  toggleBtn.addEventListener('click', () => {
    const mode = htmlEl.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
    htmlEl.setAttribute('data-bs-theme', mode);
    localStorage.setItem('theme', mode);
  });

  // Simpan preferensi theme
  window.addEventListener('DOMContentLoaded', () => {
    const saved = localStorage.getItem('theme');
    if (saved) htmlEl.setAttribute('data-bs-theme', saved);
  });
</script>
</body>
</html>