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
                    <?php
                    include("koneksi.php");
                    $id = $_GET['id_anggota'];
                    $sql = "SELECT * FROM anggota WHERE id_anggota='$id'";
                    $query = mysqli_query($koneksi, $sql);
                    $anggota = mysqli_fetch_array($query);
                    ?>
                    <h1 class="mt-3">Edit Data anggota</h1>
                    <form action="simpan_edit_anggota.php" method="POST">
                        <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota']; ?>">
                        <div class="col-md-3">
                            <label for="text" class="from-label">Nama Anggota</label>
                            <input type="text" class="form-control mb-2" name="nama_anggota" value="<?php echo $anggota['nama_anggota']; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="text" class="from-label">nis</label>
                            <input type="text" class="form-control mb-1" name="nis" value="<?php echo $anggota['nis']; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="text" class="from-label">Username</label>
                            <input type="text" class="form-control mb-1" name="username" value="<?php echo $anggota['username']; ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="text" class="from-label">Password</label>
                            <input type="text" class="form-control mb-1" name="password" value="<?php echo $anggota['password']; ?>">
                        </div>
                        <div class="mt-3">
                            <label for="number" class="from-label">kelas</label>
                            <input type="number" type="text" class="form-control mb-1" name="kelas" value="<?php echo $anggota['kelas']; ?>">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="anggota.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>