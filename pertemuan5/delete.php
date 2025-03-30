<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

$nrp = $_GET['nrp'];
$sqlDelete = "DELETE FROM siswa WHERE nrp = '$nrp'";
mysqli_query($conn, $sqlDelete);

header("location: index.php");
?>