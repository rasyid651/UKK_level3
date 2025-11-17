<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Alumni</title>
</head>
<body>

    <div>
        <h1>Tambah Data Alumni</h1>
        <a href="index.php">Kembali</a>
    </div>

    <form action="tambah.php" method="post">
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <input type="text" name="nik" placeholder="Masukkan Nik">
        <input type="text" name="nisn" placeholder="Masukkan Nisn">
        <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
        <input type="date" name="tanggal_lahir">
        <textarea name="alamat" placeholder="Masukkan Alamat"></textarea>
        <input type="text" name="tahun_lulus" placeholder="Masukkan Tahun Lulus">
        <select name="jurusan">
            <option>Pilihan Jurusan</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="Animasi">Animasi</option>
        </select>
        <button name="simpan">Simpan</button>
    </form>
    
    <?php 
        if(isset($_POST['simpan'])) {
        $sql = "INSERT INTO alumni (
            nama,nik,nisn,tempat_lahir,tanggal_lahir,alamat,tahun_lulus,jurusan
        ) VALUES 
        (
            '$_POST[nama]',
            '$_POST[nik]',
            '$_POST[nisn]',
            '$_POST[tempat_lahir]',
            '$_POST[tanggal_lahir]',
            '$_POST[alamat]',
            '$_POST[tahun_lulus]',
            '$_POST[jurusan]'
        )";

        mysqli_query($koneksi,$sql);
        echo "<p>Berhasil! <a href='index.php'>Kembali</a></p>";
        }
    ?>

</body>
</html>