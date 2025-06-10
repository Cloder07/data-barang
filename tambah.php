<?php 
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $kategori = $_POST['kategori'];

    // Query untuk insert data barang
    $sql = "INSERT INTO barang (nama, jumlah, kategori) VALUES ('$nama', '$jumlah', '$kategori')";
    if ($conn->query($sql) === TRUE) {
        // Redirect dengan parameter pesan sukses
        header("Location: index.php?msg=Barang berhasil ditambahkan");
        exit();
    } else {
        // Jika gagal, berikan pesan error
        header("Location: index.php?msg=Gagal menambahkan barang");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .btn {
            border-radius: 0.5rem;
        }
        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1055;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card p-4">
        <h3>➕ Tambah Barang</h3>
        <form action="tambah.php" method="post" class="row g-3">
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
    </div>
</div>

<!-- Toast Notification -->
<div class="toast-container">
    <?php if (isset($_GET['msg'])): ?>
        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <?= htmlspecialchars($_GET['msg']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    // Mengatur tampilan toast
    setTimeout(() => {
        const toast = document.querySelector('.toast');
        if (toast) {
            toast.classList.remove('show');
        }
    }, 3000); // Menghilangkan toast setelah 3 detik
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>