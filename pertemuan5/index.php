<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahasiswa";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <h1 class="text-center">SIMPLE CRUD IMPLEMENTATION </h1>
    <div class="container">
        <a href="tambahsiswa.php" class="mb-3" style="color:black; border-radius:10px; display: inline-block; text-decoration:none; background-color:chartreuse; padding: 10px 20px;">Tambahkan Mahasiswa</a>
        <table class="table table-hover table-bordered table-stripped" style="border: solid black;">
            <thead>
                <tr>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">No</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">NRP</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Nama</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Jenis Kelamin</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Jurusan</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Email</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Alamat</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Nomor Handphone</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Asal Sekolah</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Mata Kuliah Favorit</th>
                    <th style="background-color: #E195AB; vertical-align: top; text-align:center;">Update Data</th>
                </tr>
            </thead>
            <?php
            $sqlGet = "SELECT * FROM siswa";
            $query = mysqli_query($conn, $sqlGet);
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
                echo "
                        <tbody style='background-color: #FFCCE1;'>
                            <tr>
                                <td>$no</td>
                                <td>$data[nrp]</td>
                                <td>$data[nama]</td>
                                <td>$data[jenis_kelamin]</td>
                                <td>$data[jurusan]</td>
                                <td>$data[email]</td>
                                <td>$data[alamat]</td>
                                <td>$data[no_hp]</td>
                                <td>$data[asal_sekolah]</td>
                                <td>$data[matkul_favorit]</td>
                                <td>
                                    <div class='row '>
                                        <div class='col d-flex justify-content-center gap-2'>
                                <a href='delete.php?nrp=$data[nrp]' class='btn btn-md btn-warning' ><i class='bi bi-trash'></i></a>
                                <a href='update.php?nrp=$data[nrp]' class='btn btn-md btn-danger' ><i class='bi bi-pencil-square'></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    ";
                    $no++;
            }
            ?>
        </table>
    </div>
</body>

</html>