<?php 
	include './koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEANSPORT | Utama</title>
    <link rel="stylesheet" href="./css/user.css">
</head>
<body>
<nav class="navbar">
    <div class="navbars">
      <h1 class="logo">PEANSPORT</h1>
      <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
      <ul class="menu" id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </nav>
	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php 

					$produk = mysqli_query($conn, "SELECT * FROM produk WHERE stok = 1 ORDER BY kategori_id DESC");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
					<a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
						<div class="col-4">
							<img src="produk/<?php echo $p['foto'] ?>">
							<p class="nama"><?php echo substr($p['nama_produk'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>
  <footer class="footer">
  <div class="foters">
    <p>&copy; 2024 Peansport. All rights reserved.</p>
  </div>
</footer>
<script src="./js/script.js"></script>

</body>
</html>
