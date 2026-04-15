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


    <?php include("header_user.php"); ?>

    <?php include("menu_user.php"); ?>




    <section style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="py-3 mt-3">🛒 Daftar Buku yang di pinjam</h4>
                    <table class="table table-bordered">
                        <tr class="text-center">
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
          AND transaksi.status_transaksi = 'Peminjaman'";

                        $data = mysqli_query($koneksi, $query);

                        // Cek apakah ada datanya
                        if (mysqli_num_rows($data) > 0) {
                            foreach ($data as $peminjaman) { ?>
                                <tr class="text-center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $peminjaman['judul_buku'] ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($peminjaman['tgl_pinjam'])) ?></td>
                                    <td>
                                        <a href="pengembalian.php?id_transaksi=<?= $peminjaman['id_transaksi'] ?>&id_buku=<?= $peminjaman['id_buku'] ?>"
                                            class="btn btn-success"
                                            onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                            ✅ Pengembalian
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </table>






                </div>
            </div>
            <script>
                function pinjam(pesan, id_buku) {
                    if (confirm(pesan)) {
                        window.location.href = '?halaman=peminjaman&id=' + id_buku;
                    }
                }

                function pengembalian(pesan, id_transaksi, id_buku) {
                    if (confirm(pesan)) {
                        window.location.href = '?halaman=pengembalian&id=' + id_transaksi + '&buku=' + id_buku;
                    }
                }
            </script>

        </div>
        </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>