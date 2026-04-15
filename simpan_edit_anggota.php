<?php
include ("koneksi.php");
$id = $_POST['id_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$nis = $_POST['nis'];
$username = $_POST['username'];
$password = $_POST['password'];
$kelas = $_POST['kelas'];

$sql = "UPDATE anggota SET nama_anggota='$nama_anggota', nis='$nis', username='$username', password='$password', kelas='$kelas' WHERE id_anggota='$id'";
mysqli_query($koneksi, $sql) or die("gagal sql");
header('location:anggota.php');
?>