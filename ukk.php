Alur BE

//koneksi.php

<?php
// $koneksi = mysqli_query('localhost','root','','db_ukk2New');
?>



//index.php

<?php
session_start();
include 'koneksi.php';
?>

<?php
$result = mysqli_query($koneksi,"SELECT * FROM alumni");
while ($data = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$data['id_alumni']}</td>
    <td>{$data['nama']}</td>
    <td>{$data['nik']}</td>
    <td>{$data['nisn']}</td>
    <td>{$data['tempat_lahir']}</td>
    <td>{$data['tanggal_lahir']}</td>
    <td>{$data['alamat']}</td>
    <td>{$data['tahun_lulus']}</td>
    <td>{$data['jurusan']}</td>
    <td>
    <a href='edit.php?id_alumni={$data['id_alumni']}'>Edit</a>
    </td>
    </tr>";
}

?>



// tambah.php

<?php
session_start();
include 'koneksi.php';
?>

<?php
if(isset($_POST['simpan'])) {
    $sql = "INSERT INTO alumni (
        nama,nik,nisn,tempat_lahir,tanggal_lahir,alamat,tahun_lulus,jurusan
    ) VALUES (
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
    echo "<p>Data Berhasil disimpan <a href='#'>Kembali</a> </p>";
}





?>





//edit.php
<input type="text" name="nama" value="<?= $data['nama'] ?>">

<?php
session_start();
include 'koneksi.php';

$id_alumni = $_GET['id_alumni'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM alumni WHERE id_alumni=$id_alumni"));
if (isset($_POST['perbarui'])) {
    $sql = "UPDATE alumni SET
    nama='$_POST[nama]',nik='$_POST[nik]',nisn='$_POST[nisn]',tempat_lahir='$_POST[tempat_lahir]',
    tanggal_lahir='$_POST[tanggal_lahir]',alamat='$_POST[alamat]',tahun_lulus='$_POST[tahun_lulus]',jurusan='$_POST[jurusan]'";
    mysqli_query($koneksi,$sql);
    header('location: index.php');
}


?>



//hapus.php

<?php
session_start();
include 'koneksi.php';
$id_alumni = $_GET['id_alumni'];
$d = mysqli_query($Koneksi,"DELETE FROM alumni WHERE id_alumni=$id_alumni");
header('location: index.php');

?>