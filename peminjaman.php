<?php
include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$id_buku = $_GET['id'];
$stock_query = mysqli_query($koneksi, "SELECT stock FROM buku WHERE id_buku='$id_buku'");
$stock_row = mysqli_fetch_array($stock_query);
if ($stock_row['stock'] > 0) {
    $tgl = date('Y-m-d H:i:s');
    $query = "INSERT INTO transaksi (id_anggota,id_buku,tgl_pinjam,status_transaksi)
VALUES ('$_SESSION[id_anggota]','$id_buku','$tgl','Peminjaman')";
    $data = mysqli_query($koneksi, $query);
    if ($data) {
        mysqli_query($koneksi, "UPDATE buku SET stock = stock - 1 WHERE id_buku='$id_buku'");
        echo "<script>alert('✅ Buku Berhasil Dipinjam'); window.location.assign('dashboard_user.php');</script>";
    }
} else {
    echo "<script>alert('❌ Stock buku habis!'); window.history.back();</script>";
}
