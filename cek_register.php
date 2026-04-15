<?php
include("koneksi.php");

$nama_anggota = $_POST['nama_anggota'];
$nis = $_POST['nis'];
$username = $_POST['username'];
$password = $_POST['password'];
$kelas = $_POST['kelas'];

$sql = "INSERT INTO anggota(nama_anggota,nis,username,password,kelas) VALUES ('$nama_anggota','$nis','$username','$password','$kelas') ";
mysqli_query($koneksi, $sql) or die("gagal sql");
header("Location:login.php");
