<form action="produk.php" method="get">
  <div class="box2">
  <div class="container-1">
      <span class="icon"><i class="fa fa-search"></i></span>
      <input type="search" name="keyword" id="search" placeholder="Search..." />
	  <button type="submit">Cari</button>
  </div>
</div>
</form>



	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY kategori_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk.php?kategori=<?php echo $k['kategori_id'] ?>">
						<div class="col-5">
							<img src="./assets/icons/cart4.svg" width="50px" style="margin-bottom:5px;">
							<p><?php echo $k['nama_kategori'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>




	<!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
					$produk = mysqli_query($conn, "SELECT * FROM produk WHERE stok = 1 ORDER BY produk_id DESC LIMIT 4");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
					<a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
						<div class="col-4">
							<img src="img/<?php echo $p['foto'] ?>">
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

	<div class="section">
		<div class="container">
		<h3>Kontak Kami</h3>
		<div class="box">
		<h2>Hubungi Jika Ada Pertanyaan</h2>	
	
		</div>
		</div>
	</div>
  <footer class="footer">
  <div class="foters">
    <p>&copy; 2024 Peansport. All rights reserved.</p>
  </div>
</footer>