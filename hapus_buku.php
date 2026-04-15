<?php

include("koneksi.php");
$id = $_GET['id_buku'];

$sql = "DELETE FROM buku WHERE id_buku='$id'";
mysqli_query($koneksi, $sql) or die("gagal hapus buku");
header('location:buku.php');