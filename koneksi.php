<?php
$servername = "localhost"; // Ganti dengan nama host jika perlu
$username = "root"; // Ganti dengan nama pengguna PHPMyAdmin Anda
$password = ""; // Ganti dengan kata sandi PHPMyAdmin Anda
$database = "pw2024_tubes_233040097"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// } else {
//     echo "Koneksi berhasil";
// }
?>
