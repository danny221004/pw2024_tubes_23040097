<?php

include "koneksi.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PEANSPORT</title>
	<link rel="icon" type="image/x-icon" href="img/logo.png">
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://unpkg.com/@phosphor-icons/web"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
	<?php include "navbar.php"; ?>




	<!-- Gambar Utama -->
	<div class="container-fluid g-0">
		<img style="max-height: 400px;object-fit: cover;" class="img-fluid w-100 min-vh-25 min-vh-md-50 mb-n7" src="img/banner.jpg" srcset="" sizes="" width="" height="" alt="Photo by Irene Dávila">
	</div>


	<!-- Hero 2 Menerangkan Toko -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7" style="padding:10vw">
				<div class="lc-block me-lg-5">
					<div editable="rich" class="">
						<h1>Peansport Official Store</h1>
						<p>Website Resmi Dari Peansport Kami Menjual Segala Kebutuhan Perawatan Dan Perlengkapan Sepatu Olahraga</p>
					</div>
				</div>

				<div class="lc-block">
					<a class="btn btn-outline-primary mt-2" href="produk.php" role="button">Lihat Produk</a>
				</div><!-- /lc-block -->
			</div>
			<div class="col-md-5 my-auto p-5">
				<div class="lc-block">
					<div class="ratio ratio-16x9">
						<img class="postcard__img" src="img/banner3.png" alt="Image Title" />
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Menu Kategori -->
	<div class="container py-7">
		<h1>Kategori</h1>
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 py-4 g-4">
			<?php
			$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY kategori_id DESC");
			if (mysqli_num_rows($kategori) > 0) {
				while ($k = mysqli_fetch_array($kategori)) {
			?>
					<div class="col">
						<div class="card card-body shadow">
							<div class="d-inline-flex align-items-center">
								<div class="me-2">
									<div class="bg-light p-3 rounded-circle">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="2em" height="2em" viewBox="0 0 24 24" lc-helper="svg-icon" fill="currentColor">
											<path d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path>
										</svg>
									</div>
								</div>
								<div>
									<span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0" data-end-at="53" data-time="1000" data-delay="60" data-format="{}"> </span>
									<p class="lead" editable="inline"><b><a class="nav-link text-dark" href="produk.php?kategori=<?php echo $k['kategori_id'] ?>"><?php echo $k['nama_kategori'] ?></a></b></p>
								</div>
							</div>
						</div>
					</div>
				<?php }
			} else { ?>
				<p>Kategori tidak ada</p>
			<?php } ?>
		</div>
	</div>



	<!-- Menu Produk Terbaru Dibuat Dengan Desc Limit Atau Sorting berdasarkan inputan Terbaru -->
	<section class="dark">
		<div class="container py-2">
			<div class="h1 text-center text-white" id="pageHeaderTitle">Produk Terbaru</div>
			<div class="container py-4 py-lg-6">
				<div class="row">
					<?php
					$produk = mysqli_query($conn, "SELECT * FROM produk WHERE stok = 1 ORDER BY produk_id DESC LIMIT 3");
					if (mysqli_num_rows($produk) > 0) {
						while ($p = mysqli_fetch_array($produk)) {
					?>
							<div class="col-lg-4">
								<div class="card shadow-lg p-3">
									<img class="card-img-top" src="img/<?php echo $p['foto'] ?>" loading="lazy">

									<div class="card-body">
										<div class="lc-block text-center mb-3">
											<div editable="rich">

												<h3><?php echo substr($p['nama_produk'], 0, 30) ?></h3>
											</div>
										</div>
										<div class="lc-block text-center"> <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
												<button type="submit" class="btn btn-outline-dark mt-2">Lihat Detail</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php }
					} else { ?>
						<p>Produk tidak ada</p>
					<?php } ?>
				</div>
			</div>
	</section>


	<!-- Menu 3 Tentang Kami -->

	<section class="light">
		<div class="container py-2">
			<div class="h1 text-center text-dark" id="pageHeaderTitle">Tentang Kami</div>

			<article class="postcard light blue">
				<a class="postcard__img_link" href="#">
					<img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h1 class="postcard__title blue"><a href="#">Sejarah</a></h1>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">
						PEANSPORT didirakan pada tahun 2023 tepatnya pada bulan Oktober
						Arti daru sebuah nama merknya adalah Pean diambil dari bahasa sunda yang artinya "Kaki"
						Dan Sport diambil dari bahasa inggris yang artinya olahraga.
					</div>
				</div>
			</article>
			<article class="postcard light red">
				<a class="postcard__img_link" href="#">
					<img class="postcard__img" style="height: 300px;" src="img/g1.jpg" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h1 class="postcard__title red"><a href="#">Peansport</a></h1>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">PEANSPORT adalah sebuah merk brand lokal yang berasal dari Provinsi Banten yang diciptakan oleh seorang anak muda yang kreatif
						tujuannya dibuat untuk menjual berbagai kebutuhan perawatan sepatu olahraga yang murah dan berkualitas agar tetap menjaga kenyamanan costumer.
					</div>
				</div>
			</article>
		</div>
	</section>

	<!-- Footer -->
	<?php include "footer.php"; ?>
	</div>
	</div>

	<script src="assets/js/script.js"></script>
</body>

</html>