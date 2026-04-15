<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <?php
    include 'menu.php'
    ?>


    <section style="min-height:200px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="py-2 mt-3">Data Transaksi Peminjaman Buku 🛒</h1>
                    <a href="tambah_transaksi.php" class="btn btn-secondary mb-3">➕ Tambah Data Transaksi</a>

                    <table class="table table-bordered border-dark">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Nis</td>
                                <td>Nama Anggota</td>
                                <td>Judul Buku</td>
                                <td>Tanggal Pinjam</td>
                                <td>Tanggal Kembali</td>
                                <td>Aksi </td>
                            </tr>
                        <tbody>
                            <?php
                            include("koneksi.php");
                            $sql = "SELECT * FROM transaksi,buku,anggota WHERE buku.id_buku=transaksi.id_buku AND 
                            anggota.id_anggota=transaksi.id_anggota AND transaksi.status_transaksi='Peminjaman' ORDER BY transaksi.id_transaksi DESC ";
                            $query = mysqli_query($koneksi, $sql);
                            foreach ($query as $transaksi) { ?>
                                <tr>
                                    <td><?php echo $transaksi['id_transaksi'] ?></td>
                                    <td><?php echo $transaksi['nis'] ?></td>
                                    <td><?php echo $transaksi['nama_anggota'] ?></td>
                                    <td><?php echo $transaksi['judul_buku'] ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($transaksi['tgl_pinjam'])); ?></td>
                                    <td><?php echo  !empty($transaksi['tgl_kembali']) ? date('d/m/Y H:i', strtotime($transaksi['tgl_kembali'])) : '-' ?></td>
                                    <td>
                                        <a href="edit_transaksi.php?id_transaksi=<?php echo $transaksi['id_transaksi'] ?>" class="btn btn-warning">Edit</a>

                                        <a href="hapus_transaksi.php?id_transaksi=<?php echo $transaksi['id_transaksi'] ?>" class="btn btn-danger btn-sm">🚮 Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <section style="min-height:200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-3">Data Transaksi Pengembalian Buku 🛒</h1>
                    <table class="table table-bordered border-dark">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <td>No</td>
                                <td>Nis</td>
                                <td>Nama Anggota</td>
                                <td>Judul Buku</td>
                                <td>Tanggal Peminjaman</td>
                                <td>Tanggal Pengembalian</td>
                            </tr>
                        <tbody>
                            <?php
                            include("koneksi.php");
                            $sql = "SELECT * FROM transaksi,buku,anggota WHERE buku.id_buku=transaksi.id_buku AND anggota.id_anggota=transaksi.id_anggota AND transaksi.status_transaksi='Pengembalian' ORDER BY transaksi.id_transaksi DESC";
                            $query = mysqli_query($koneksi, $sql);
                            foreach ($query as $transaksi) {
                            ?>
                                <tr>
                                    <td><?php echo $transaksi['id_transaksi'] ?></td>
                                    <td><?php echo $transaksi['nis'] ?></td>
                                    <td><?php echo $transaksi['nama_anggota'] ?></td>
                                    <td><?php echo $transaksi['judul_buku'] ?></td>
                                    <td><?php echo $transaksi['tgl_pinjam'] ?></td>
                                    <td><?php echo $transaksi['tgl_kembali'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        function pengembalian(pesan, id_transaksi, id_buku) {
            if (confirm(pesan)) {
                window.location.href = 'transaksi_pengembalian.php?id_transaksi=' + id_transaksi + '&buku=' + id_buku;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>