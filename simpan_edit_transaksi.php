<?php
include("koneksi.php");

if (isset($_POST['tombol'])) {

    $id_transaksi = $_POST['id_transaksi'];
    $id_anggota   = $_POST['id_anggota'];
    $id_buku      = $_POST['id_buku'];
    $tgl_pinjam   = $_POST['tgl_pinjam'];
    $tempo        = (int)$_POST['tempo'];


    $tgl_kembali = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' + ' . $tempo . ' days'));


    $lama_query = mysqli_query($koneksi, "SELECT id_buku FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $lama_row   = mysqli_fetch_array($lama_query);
    $buku_lama  = $lama_row['id_buku'];


    if ($buku_lama != $id_buku) {

        mysqli_query($koneksi, "UPDATE buku SET stock = stock + 1, status='tersedia' WHERE id_buku='$buku_lama'");
        mysqli_query($koneksi, "UPDATE buku SET stock = stock - 1 WHERE id_buku='$id_buku'");
    }
    $query = "UPDATE transaksi SET 
                id_anggota       = '$id_anggota', 
                id_buku          = '$id_buku', 
                tgl_pinjam       = '$tgl_pinjam', 
                tgl_kembali      = '$tgl_kembali' 
              WHERE id_transaksi = '$id_transaksi'";

    $data = mysqli_query($koneksi, $query);

    if ($data) {
        echo "<script>alert('✅ Data Transaksi Berhasil Diperbarui'); window.location.assign('transaksi.php');</script>";
    } else {
        echo "<script>alert('❌ Maaf, Perubahan Gagal Disimpan'); window.history.back();</script>";
    }
}
