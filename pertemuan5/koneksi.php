<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
echo "Koneksi Berhasil<br/>";
?>
