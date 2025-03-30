<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nrp = $_GET['nrp'];
$sqlGet = "SELECT * FROM siswa WHERE nrp='$nrp'";
$queryGet = mysqli_query($conn, $sqlGet);
$data = mysqli_fetch_array($queryGet);

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

    // Menggunakan query SQL untuk update
    $sqlUpdate = "UPDATE siswa SET 
                    nama = '$nama', 
                    jenis_kelamin = '$jenis_kelamin', 
                    jurusan = '$jurusan', 
                    email = '$email', 
                    alamat = '$alamat', 
                    no_hp = '$no_hp', 
                    asal_sekolah = '$asal_sekolah', 
                    matkul_favorit = '$matkul_favorit' 
                  WHERE nrp = '$nrp'";

    if (mysqli_query($conn, $sqlUpdate)) {
        header("location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Update Data Siswa</h2>
        <form method="post">
            <input type="hidden" name="nrp" value="<?php echo($data['nrp']); ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo($data['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo($data['jenis_kelamin']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" value="<?php echo($data['jurusan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo($data['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo($data['alamat']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" name="no_hp" value="<?php echo($data['no_hp']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                <input type="text" class="form-control" name="asal_sekolah" value="<?php echo($data['asal_sekolah']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="matkul_favorit" class="form-label">Mata Kuliah Favorit</label>
                <input type="text" class="form-control" name="matkul_favorit" value="<?php echo($data['matkul_favorit']); ?>" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>