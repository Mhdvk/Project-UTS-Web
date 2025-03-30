<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if (isset($_POST['tambah'])) {
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $matkul_favorit = $_POST['matkul_favorit'];

    $sqlGet = "SELECT * FROM siswa";
    $sql = "INSERT INTO siswa (nrp, nama, jenis_kelamin, jurusan, email, alamat, no_hp, asal_sekolah, matkul_favorit) 
            VALUES ('$nrp', '$nama', '$jenis_kelamin', '$jurusan', '$email', '$alamat', '$no_hp', '$asal_sekolah', '$matkul_favorit')";
    //Inserting Data
    if (mysqli_query($conn, $sql)) {
        echo "
        <div class='alert alert-success'>Data berhasil ditambahkan <a href='index.php'>Lihat data terbaru</a></div>
        ";
    } else {
        echo "
                <div class='alert alert-danger'>Data gagal ditambahkan <a href='index.php'>Lihat data terbaru</a></div> Error: 
        " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center">Masukkan Data Diri Mahasiswa</h1>
    <div class="container">
        <h2>Tambah Data Siswa</h2>
        <form action="tambahsiswa.php" method="post">
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">jenis_kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat"  required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
            </div>
            <div class="mb-3">
                <label for="matkul_favorit" class="form-label">Mata Kuliah Favorit</label>
                <input type="text" class="form-control" id="matkul_favorit" name="matkul_favorit" required>
            </div>
            <input type="submit" class="btn btn-primary" name="tambah" value="Tambah Data"></input>
        </form>

        <table class="table table-hover table-bordered table-stripped">
        </table>
    </div>
</body>

</html>

