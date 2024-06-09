<?php 
	session_start();
	include '../koneksi.php';
	if($_SESSION['username'] != true){
		echo '<script>window.location="login.php"</script>';
	} 
    

    // Query untuk mengambil jumlah data dari tabel pertama
$query1 = "SELECT COUNT(*) as total FROM produk"; // Ganti 'tabel_pertama' dengan nama tabel pertama Anda

// Query untuk mengambil jumlah data dari tabel kedua
$query2 = "SELECT COUNT(*) as total FROM kategori"; // Ganti 'tabel_kedua' dengan nama tabel kedua Anda

// Menjalankan query untuk tabel pertama
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);

// Menjalankan query untuk tabel kedua
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);

// Menutup koneksi database
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PEANSPORT | ADMIN</title>
<link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body>
<!-- header -->
<div class="sidebar">
    <a href="dashboard.php">Beranda</a>
    <div class="dropdown">
        <a href="#">Produk</a>
        <div class="dropdown-content">
            <a href="data-produk.php">Data Produk</a>
            <a href="tambah-produk.php">Tambah Produk</a>
        </div>
    </div>
	<div class="dropdown">
        <a href="#">Kategori</a>
        <div class="dropdown-content">
            <a href="data-kategori.php">Data Kategori</a>
            <a href="tambah-kategori.php">Tambah Kategori</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">Profile</a>
        <div class="dropdown-content">
            <a href="data-admin.php">Data Admin</a>
            <a href="daftar.php">Tambah Admin</a>
        </div>
    </div>
    <a href="keluar.php">Logout</a>
</div>

<div class="content">
<div class="container">
<div class="card">
    <h3>Data Tabel Produk</h3>
    <p><?php echo $row1['total']; ?></p>
</div>
<div class="card">
    <h3>Data Tabel Kategori</h3>
    <p><?php echo $row2['total']; ?></p>
</div>
</div>
</div>

</body>
</html>
