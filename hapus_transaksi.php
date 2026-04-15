<?php

include("koneksi.php");

$id = $_GET['id_transaksi'];

$sql = "DELETE FROM transaksi WHERE id_transaksi='$id'";
mysqli_query($koneksi, $sql);
header("Location:transaksi.php");
