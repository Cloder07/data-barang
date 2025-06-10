<?php
include 'koneksi.php';

// Statistik data
$total_barang = $conn->query("SELECT SUM(jumlah) as total FROM barang")->fetch_assoc()['total'] ?? 0;
$total_kategori = $conn->query("SELECT COUNT(DISTINCT kategori) as total FROM barang")->fetch_assoc()['total'] ?? 0;
$kategori_data = $conn->query("SELECT kategori, SUM(jumlah) as jumlah FROM barang GROUP BY kategori");

$data_kategori = [];
$data_jumlah = [];
while ($row = $kategori_data->fetch_assoc()) {
    $data_kategori[] = $row['kategori'];
    $data_jumlah[] = $row['jumlah'];
}
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="light"> <!-- Ubah dinamis pakai JS -->
<head>
  <meta charset="UTF-8">
  <title>Dashboard Statistik</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      transition: background-color 0.3s, color 0.3s;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .chart-container {
      position: relative;
      height: 300px;
    }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">📊 Dashboard Statistik</h2>
    <button id="themeToggle" class="btn btn-outline-secondary">🌓 Dark Mode</button>
  </div>

  <div class="row mb-4">
    <div class="col-md-6">
      <div class="card text-bg-primary p-4">
        <h4>Total Barang</h4>
        <h2><?= number_format($total_barang) ?></h2>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card text-bg-success p-4">
        <h4>Total Kategori</h4>
        <h2><?= number_format($total_kategori) ?></h2>
      </div>
    </div>
  </div>

  <div class="card p-4 mb-4">
    <h5 class="mb-3">Jumlah Barang per Kategori</h5>
    <div class="chart-container">
      <canvas id="kategoriChart"></canvas>
    </div>
  </div>

  <div class="text-center">
    <a href="index.php" class="btn btn-outline-info">← Kembali ke Data Barang</a>
  </div>
</div>

<script>
  const ctx = document.getElementById('kategoriChart').getContext('2d');
  const kategoriChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($data_kategori) ?>,
      datasets: [{
        label: 'Jumlah Barang',
        data: <?= json_encode($data_jumlah) ?>,
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderRadius: 5
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: true }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });

  // Toggle Dark/Light Mode
  const themeToggle = document.getElementById('themeToggle');
  const htmlEl = document.documentElement;

  themeToggle.addEventListener('click', () => {
    const current = htmlEl.getAttribute('data-bs-theme');
    const next = current === 'dark' ? 'light' : 'dark';
    htmlEl.setAttribute('data-bs-theme', next);
    localStorage.setItem('theme', next);
  });

  // Load theme preference
  window.addEventListener('DOMContentLoaded', () => {
    const saved = localStorage.getItem('theme');
    if (saved) {
      htmlEl.setAttribute('data-bs-theme', saved);
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>