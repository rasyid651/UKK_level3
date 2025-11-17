<?php 
session_start();
include 'koneksi.php';
$id_alumni = $_GET['id_alumni'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM alumni WHERE id_alumni=$id_alumni"));
if(isset($_POST['perbarui'])) {
    $sql = "UPDATE alumni SET
    nama='$_POST[nama]',nik='$_POST[nik]',nisn='$_POST[nisn]',tempat_lahir='$_POST[tempat_lahir]',tanggal_lahir='$_POST[tanggal_lahir]',
    alamat='$_POST[alamat]',tahun_lulus='$_POST[tahun_lulus]',jurusan='$_POST[jurusan]' WHERE id_alumni=$id_alumni";
    mysqli_query($koneksi,$sql);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Alumni</title>
</head>
<body>

    <div>
        <h1>Edit Data Alumni</h1>
        <a href="index.php">Kembali</a>
    </div>

   <form method="post">
       <input name="nama" value="<?= $data['nama']?>" placeholder="Masukkan Nama" required>
        <input  name="nik" value="<?= $data['nik'] ?>" placeholder="Masukkan Nik" required>
        <input name="nisn" value="<?= $data['nisn'] ?>" placeholder="Masukkan Nisn" required>
        <input name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" placeholder="Masukkan Tempat Lahir" required>
        <input name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>
        <textarea name="alamat" placeholder="Masukkan Alamat"><?= $data['alamat'] ?></textarea>
        <input name="tahun_lulus" value="<?= $data['tahun_lulus'] ?>" placeholder="Masukkan Tahun">
       
        <select name="jurusan" value="<?= $data['jurusan'] ?>">
            <option>Pilihan Jurusan</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="Animasi">Animasi</option>
        </select>
        <button name="perbarui">Perbarui</button>
    </form>
</body>
</html>