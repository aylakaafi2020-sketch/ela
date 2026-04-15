<?php
include("koneksi.php");
if (isset($_POST['tombol'])) {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tempo = (int)$_POST['tempo'];
    $tgl_kembali = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' + ' . $tempo . ' days'));
    $status_transaksi = "Peminjaman";
    $stock_query = mysqli_query($koneksi, "SELECT stock FROM buku WHERE id_buku='$id_buku'");
    $stock_row = mysqli_fetch_array($stock_query);
    if ($stock_row && $stock_row['stock'] > 0) {
        $query = "INSERT INTO transaksi (id_anggota,id_buku,tgl_pinjam,tgl_kembali,status_transaksi) VALUES ('$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali','$status_transaksi')";
        $data = mysqli_query($koneksi, $query);
        if ($data) {
            mysqli_query($koneksi, "UPDATE buku SET stock = stock - 1, status='tidak tersedia' WHERE id_buku='$id_buku'");
            echo "<script>alert('✅ Data Transaksi Peminjaman Berhasil Disimpan (Tempo: {$tempo} hari)'); window.location.assign('transaksi.php');</script>";
        } else {
            echo "<script>alert('❌ Maaf Data Transaksi Peminjaman Gagal Disimpan'); window.location.assign('tambah_transaksi.php');</script>";
        }
    } else {
        echo "<script>alert('❌ Stock buku habis!'); window.history.back();</script>";
    }
}