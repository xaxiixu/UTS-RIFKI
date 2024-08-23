<?php
$server = "localhost";
$user = "root";
$password = ""; // Sesuaikan dengan password MySQL Anda, atau kosongkan jika tidak ada password.
$database = "dbakademik";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
