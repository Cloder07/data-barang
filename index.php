<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="light"> <!-- Default ke light mode -->
<head>
  <meta charset="UTF-8">
  <title>Data Barang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      transition: background-color 0.3s, color 0.3s;
    }
    .card, .table {
      border-radius: 1rem;
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
  <button id="themeToggle" class="btn btn-sm btn-outline-secondary btn-toggle">🌓 Dark Mode</button>

  <h2 class="mb-4 text-center">📦 Data Barang</h2>

  <!-- Form Tambah -->
  <form action="tambah.php" method="post" class="row g-3 mb-4">
    <div class="col-md-4">
      <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
    </div>
    <div class="col-md-3">
      <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
    </div>
    <div class="col-md-3">
      <input type="text" name="kategori" class="form-control" placeholder="Kategori" required>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Tambah</button>
    </div>
  </form>

  <!-- Filter dan Cari -->
  <?php
  $filter_kategori = $_GET['kategori'] ?? '';
  $keyword = $_GET['keyword'] ?? '';
  ?>
  <form method="get" class="row g-3 mb-3">
    <div class="col-md-4">
      <input type="text" name="keyword" class="form-control" placeholder="Cari nama barang..." value="<?= htmlspecialchars($keyword) ?>">
    </div>
    <div class="col-md-4">
      <select name="kategori" class="form-select">
        <option value="">Semua Kategori</option>
        <?php
        $kategori_result = $conn->query("SELECT DISTINCT kategori FROM barang");
        while ($k = $kategori_result->fetch_assoc()) {
          $selected = ($filter_kategori == $k['kategori']) ? 'selected' : '';
          echo "<option value='{$k['kategori']}' $selected>{$k['kategori']}</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary">Filter</button>
      <a href="index.php" class="btn btn-secondary">Reset</a>
      <a href="dashboard.php" class="btn btn-info">📊 Dashboard</a>
    </div>
  </form>

  <!-- Tabel Data -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM barang WHERE 1=1";
        if (!empty($keyword)) {
          $kw = $conn->real_escape_string($keyword);
          $sql .= " AND nama LIKE '%$kw%'";
        }
        if (!empty($filter_kategori)) {
          $kat = $conn->real_escape_string($filter_kategori);
          $sql .= " AND kategori = '$kat'";
        }
        $sql .= " ORDER BY id DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>" . $no++ . "</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['jumlah']}</td>
                  <td>{$row['kategori']}</td>
                  <td>
                    <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                    <a href='hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                  </td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
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