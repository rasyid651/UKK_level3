<?php
include 'koneksi.php';

// Pastikan ada parameter id
if (isset($_GET['id_alumni'])) {
    $id_alumni = intval($_GET['id_alumni']);

    // Hapus data
    mysqli_query($koneksi, "DELETE FROM alumni WHERE id_alumni = $id_alumni");

    // Menyusun ulang ID agar urut lagi dari 1
    mysqli_query($koneksi, "SET @num := 0");
    mysqli_query($koneksi, "UPDATE alumni SET id_alumni = @num := @num + 1 ORDER BY id_alumni");

    // Reset auto increment agar lanjut dari ID terakhir
    mysqli_query($koneksi, "ALTER TABLE alumni AUTO_INCREMENT = 1");
}

// Kembali ke halaman utama
header("Location: index.php");
exit;