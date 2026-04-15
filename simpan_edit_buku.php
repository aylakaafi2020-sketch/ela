<?php
include ("koneksi.php");
$id = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$stock = $_POST['stock'];

$sql = "UPDATE buku SET judul_buku='$judul_buku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', stock='$stock' WHERE id_buku='$id'";
mysqli_query($koneksi, $sql) or die("gagal sql");
header('location:buku.php');
?>