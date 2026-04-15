<?php

include("koneksi.php");
$id = $_GET['id_anggota'];

$sql = "DELETE FROM anggota WHERE id_anggota='$id'";
mysqli_query($koneksi, $sql) or die("gagal hapus anggota");
header('location:anggota.php');