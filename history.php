<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Dashoard Admin | Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <?php include("header_user.php"); ?>

    <?php include("menu_user.php"); ?>




    <section style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-3"> ✅ History Pengembalian :</h4>
                    <table class="table table-bordered">
                        <tr class="fw-bold">
                            <td>NO</td>
                            <td>Judul Buku</td>
                            <td>Tanggal Pinjam</td>
                            <td>Pengembalian</td>
                        </tr>

                        <?php
                        include 'koneksi.php';
                        $no = 1;

                        // Tambahkan pengaman agar tidak error jika session kosong
                        $id_anggota_session = $_SESSION['id_anggota'] ?? 0;

                        $query = "SELECT * FROM transaksi 
          JOIN buku ON buku.id_buku = transaksi.id_buku 
          WHERE transaksi.id_anggota = '$id_anggota_session' 
          AND transaksi.status_transaksi = 'Pengembalian'";
                        $data = mysqli_query($koneksi, $query);
                        foreach ($data as $peminjaman) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $peminjaman['judul_buku'] ?></td>
                                <td><?= $peminjaman['tgl_pinjam'] ?></td>
                                <td><?= $peminjaman['tgl_kembali'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>