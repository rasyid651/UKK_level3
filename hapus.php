<?php
session_start();
include 'koneksi.php';
$id_alumni = $_GET['id_alumni'];
$d = mysqli_query($Koneksi,"DELETE FROM alumni WHERE id_alumni=$id_alumni");
header('location: index.php');
?>