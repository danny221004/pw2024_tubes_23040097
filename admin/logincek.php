<?php
include "../koneksi.php";
// ketika tombol loginbtn di klik
// if(isset($_POST['loginbtn']))
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
    // menampilkan tabel daru user berdasarkana data dari atas
	$sql  = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    // menghitung nilai isis dari perintah sql query
    $hitung = mysqli_num_rows($sql);

    if($hitung >0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        // echo '<script>alert("Password Benar ")</script>';
        header('location: ../admin/dashboard.php');
	} else {
        echo '<script>alert("Passwor Atau Username Salah ")</script>';
        header('location: ../admin/login.php');

    }
?>

