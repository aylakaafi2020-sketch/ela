<?php
session_start()
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>halaman dashboard admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>

    <section style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-3">Tambah Data Buku</h1>
                    <form action="simpan_tambah_buku.php" method="POST">
                        <div class="col-md-3">
                            <label for="text" class="from-label">Judul Buku</label>
                            <input type="text" class="form-control mb-2" name="judul_buku" placeholder="masukkan judul buku" required>
                        </div>
                        <div class="col-md-3">
                            <label for="text" class="from-label">Pengarang</label>
                            <input type="text" class="form-control mb-1" name="pengarang" placeholder="masukkan pengarang buku" required>
                        </div>
                        <div class="col-md-3">
                            <label for="text" class="from-label">penerbit</label>
                            <input type="text" class="form-control mb-1" name="penerbit" placeholder="masukkan penerbit buku" required>
                        </div>
                        <div class="col-md-3">
                            <label for="number" class="from-label">Tahun Terbit</label>
                            <input type="number" class="form-control mb-1" name="tahun_terbit" placeholder="masukkan tahun terbit buku" required>
                        </div>
                        <div class="mt-3">
                            <label for="number" class="from-label">stock</label>
                            <input type="number" class="form-control mb-1" name="stock" placeholder="masukkan stock buku" value="1" min=")">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="buku.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>