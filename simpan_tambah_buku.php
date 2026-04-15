<?php
include 'koneksi.php';
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$stock = $_POST['stock'];

$sql = "INSERT INTO buku (judul_buku,pengarang,penerbit,tahun_terbit,stock,status) VALUES('$judul_buku','$pengarang','$penerbit','$tahun_terbit','$stock','tersedia')";
mysqli_query($koneksi, $sql) or die("gagal sql");
header('location:buku.php');