<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>halaman buku admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>

    <section style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-3 mb-3">Kelola Data Anggota 📚</h1>   
                    <a href="tambah_anggota.php" class="btn btn-secondary mb-3">➕ Tambah Data Anggota</a>
                    <table class="table table-bordered border-dark">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <td>No</td>
                                <td>Nama Anggota</td>
                                <td>Nis</td>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Kelas</td>
                                <td>Aksi</td>
                            </tr>
                        <tbody>
                            <?php
                            include("koneksi.php");
                            $sql = "SELECT * FROM anggota";
                            $query = mysqli_query($koneksi, $sql);
                            while ($anggota = mysqli_fetch_array($query)) {
                            ?>
                            <tr class="text-center">
                                <td><?php echo $anggota['id_anggota'] ?></td>
                                <td><?php echo $anggota['nama_anggota'] ?></td>
                                <td><?php echo $anggota['nis'] ?></td>
                                <td><?php echo $anggota['username'] ?></td>
                                <td><?php echo $anggota['password'] ?></td>
                                <td><?php echo $anggota['kelas'] ?></td>
                                <td>
                                    <a href="edit_anggota.php?id_anggota=<?php echo $anggota['id_anggota'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus_anggota.php?id_anggota=<?php echo $anggota['id_anggota'] ?>" class="btn btn-danger">Hapus</a>
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
    


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>