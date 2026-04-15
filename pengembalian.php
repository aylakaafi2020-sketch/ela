<?php
include("koneksi.php");
date_default_timezone_set("Asia/Jakarta");


$id_transaksi = $_GET['id_transaksi'] ?? 0;
$id_buku      = $_GET['id_buku'] ?? 0;
$tgl_sekarang = date('Y-m-d H:i:s');

if ($id_transaksi && $id_buku) {

    $query_update_transaksi = "UPDATE transaksi SET 
                                tgl_kembali      = '$tgl_sekarang', 
                                status_transaksi = 'Pengembalian' 
                               WHERE id_transaksi = '$id_transaksi'";

    $eksekusi = mysqli_query($koneksi, $query_update_transaksi);

    if ($eksekusi) {

        mysqli_query($koneksi, "UPDATE buku SET stock = stock + 1, status = 'Tersedia' WHERE id_buku = '$id_buku'");

        echo "<script>alert('✅ Buku Berhasil Dikembalikan!'); window.location.assign('kembali.php');</script>";
    } else {
        echo "<script>alert('❌ Gagal Proses Pengembalian'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('❌ Data Tidak Lengkap'); window.location.assign('kembali.php');</script>";
}
