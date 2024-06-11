<?php
session_start();
include "../koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

// Check if username already exists
$sql_check_username = "SELECT * FROM user WHERE username = '$username'";
$result_check_username = mysqli_query($conn, $sql_check_username);

if (mysqli_num_rows($result_check_username) > 0) {
    echo "Username already exists!";
} else {
    // Insert new user into database
    $sql_insert_user = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql_insert_user)) {
        echo "Registration successful!";
        // Redirect to login page
        header('Location: ../admin/dashboard.php');
    } else {
        echo "Error: " . $sql_insert_user . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
