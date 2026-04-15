<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('header.php'); ?>
    <?php include('menu.php'); ?>

    <section style="min-height:200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include("koneksi.php");

                    $id = $_GET['id_transaksi'];


                    $sql_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
                    $data_lama = mysqli_fetch_array($sql_transaksi);

                    $anggota_list = mysqli_query($koneksi, "SELECT * FROM anggota");
                    $buku_list = mysqli_query($koneksi, "SELECT * FROM buku WHERE status='tersedia' OR id_buku='" . $data_lama['id_buku'] . "'");
                    ?>

                    <h1 class="mt-3">Edit Data Peminjaman</h1>

                    <form action="simpan_edit_transaksi.php" method="POST">
                        <input type="hidden" name="id_transaksi" value="<?php echo $data_lama['id_transaksi']; ?>">

                        <div class="col-md-5 mb-3">
                            <label class="form-label">Nama Anggota</label>
                            <select name="id_anggota" class="form-control" required>
                                <?php while ($a = mysqli_fetch_array($anggota_list)): ?>
                                    <option value="<?= $a['id_anggota'] ?>" <?= ($a['id_anggota'] == $data_lama['id_anggota']) ? 'selected' : '' ?>>
                                        <?= $a['nama_anggota'] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-md-5 mb-3">
                            <label class="form-label">Judul Buku</label>
                            <select name="id_buku" class="form-control" required>
                                <?php while ($b = mysqli_fetch_array($buku_list)): ?>
                                    <option value="<?= $b['id_buku'] ?>" <?= ($b['id_buku'] == $data_lama['id_buku']) ? 'selected' : '' ?>>
                                        <?= $b['judul_buku'] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-md-5 mb-3">
                            <label class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam"
                                value="<?php echo date('Y-m-d\TH:i', strtotime($data_lama['tgl_pinjam'])); ?>">
                        </div>

                        <div class="col-md-5 mb-3">
                            <label class="form-label">Tempo (Hari)</label>
                            <select name="tempo" class="form-control">
                                <?php for ($i = 1; $i <= 7; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?> Hari</option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="tombol" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="transaksi.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>