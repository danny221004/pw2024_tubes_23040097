<?php
session_start();
include '../koneksi.php';
if ($_SESSION['username'] != true) {
	echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Peansport</title>
	<link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>

<body>
	<?php include "sidebar.php"; ?>

	<!-- content -->
	<div class="content">
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Passsword</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$user = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
				if (mysqli_num_rows($user) > 0) {
					while ($row = mysqli_fetch_array($user)) {
				?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['password'] ?></td>

							<td>
								<a class="btn btn-warning" href="edit-kategori.php?id=<?php echo $row['id'] ?>" role="button">Edit</a>
								<a class="btn btn-danger" href="proses-hapus.php?ida=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" role="button">Hapus</a>
							</td>
						</tr>
					<?php }
				} else { ?>
					<tr>
						<td colspan="3">Tidak ada data</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
	<!-- footer -->

	<script src="../js/menu.js"></script>

</body>

</html>