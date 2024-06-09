<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
            <a href="data-kategori.php">Data Admin</a>
            <a href="daftar.php">Tambah Admin</a>
        </div>
    </div>
    <a href="keluar.php">Logout</a>
</div>
    <div class="content">
        <div class="container">
        <form action="cek_daftar.php" method="POST">
            <h2>Register</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
            <a href="../admin/login.php">Login</a>

        </form>
    </div>
    </div>

</body>
</html>
