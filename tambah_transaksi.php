<?php
session_start();
if (empty($_SESSION['nama_admin'])) {
    header("Location:login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Dashoard Admin | Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php if (isset($custom_styles)) echo $custom_styles; ?>
</head>

<body>


    <?php include("header.php"); ?>

    <?php include("menu.php"); ?>


    <section style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include("koneksi.php");
                    date_default_timezone_set("Asia/Jakarta");
                    $anggota_query = "SELECT * FROM anggota ORDER BY nama_anggota";
                    $anggota = mysqli_query($koneksi, $anggota_query);

                    $buku_query = "SELECT * FROM buku WHERE status='tersedia' ORDER BY judul_buku";
                    $buku = mysqli_query($koneksi, $buku_query);
                    ?>
                    <h4 class="py-3 mt-3">🛒 Tambah Data Peminjaman</h4>
                    <form method="post" action="simpan_tambah_transaksi.php" class="mt-3">
                        <div class="col-md-4">
                            <select name="id_anggota" class="form-control mb-2" required>
                                <option value=""> === Pilih Anggota ===</option>
                                <?php while ($a = mysqli_fetch_assoc($anggota)): ?>
                                    <option value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?> (<?= $a['nis'] ?>)</option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="id_buku" class="form-control mb-2" required>
                                <option value=""> === Pilih Buku ===</option>
                                <?php while ($bu = mysqli_fetch_assoc($buku)): ?>
                                    <option value="<?= $bu['id_buku'] ?>"><?= $bu['judul_buku'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <input type="hidden" name="tgl_pinjam" value="<?= date('Y-m-d H:i:s') ?>">
                        <div class="col-md-4 mb-2">
                            <label>Tempo Peminjaman:</label>
                            <select name="tempo" class="form-control" required>
                                <option value="">Pilih Tempo</option>
                                <?php for ($i = 1; $i <= 7; $i++): ?><option value="<?= $i ?>"><?= $i ?> hari</option><?php endfor; ?>
                            </select>
                        </div>
                        <button type="submit" name="tombol" class="btn btn-primary"> 💾 Simpan Data Peminjaman </button>
                    </form>
                </div>
            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>