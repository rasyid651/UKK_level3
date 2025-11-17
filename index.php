<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Alumni</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="nav">
        <h1>Manajemen Data Alumni</h1>
        <a href="tambah.php">+ Tambah</a>
    </div>


     <!-- FORM PENCARIAN -->
      <div class="container-pencarian">
          <form method="GET" class="pencarian">
              <h2>Cari</h2> 
              <input type="text" name="cari" placeholder="Cari nama / NIK / NISN / Jurusan..."
              value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
              <button type="submit" >Cari</button>
            </form>
        </div>
            
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nik</th>
            <th>Nisn</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tahunn Lulus</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>

         <?php
        // PENCARIAN
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $result = mysqli_query($koneksi, "SELECT * FROM alumni 
                WHERE nama LIKE '%$cari%' 
                OR nik LIKE '%$cari%' 
                OR nisn LIKE '%$cari%' 
                OR jurusan LIKE '%$cari%' 
                OR tahun_lulus LIKE '%$cari%' ");
        } else {
            $result = mysqli_query($koneksi, "SELECT * FROM alumni");
        }
        ?>

   <?php
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
    <a href='hapus.php?id_alumni={$data['id_alumni']}'>Hapus</a>
    </td>
    </tr>";
}
?>

    </table>
    
</body>
</html>