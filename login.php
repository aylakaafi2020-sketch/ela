<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>demo UKK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class="vh-100 row justify-content-center align-items-center">
    <form action="#" method="post" class="col-md-4 border p-4 bg-white rounded-4 shadow">
      <img src="logo-smk2.png" width="100px" class="mx-auto d-block mb-3">
      <h3 class="text-center mb-4">Login Perpustakaan Digital</h3>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input name="username" type="text" class="form-control" placeholder="Masukkan Username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">password</label>
        <input name="password" type="text" class="form-control" placeholder="Masukkan password" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select" required>
          <option value="">Pilihan Role</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>
      <button type="submit" name="tombol" class="btn btn-success w-100 mb-3">Login</button>
      <div class="text-center">
        <a href="register.php" class="text-decoration-none">Daftar Sebagai User?</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['tombol'])) {
  include 'koneksi.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  if ($role == 'admin') {
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $data = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($data) > 0) {
      $data = mysqli_fetch_array($data);
      session_start();
      $_SESSION['id_admin'] = $data['id_admin'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['nama_admin'] = $data['nama_admin'];
      header("location:index.php");
    } else {
      echo "<script>alert('Login Admin Gagal'); window.location.assign('login.php');</script>";
    }
  } else {
    $query = "SELECT * FROM anggota WHERE username='$username' AND password='$password'";
    $data = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($data) > 0) {
      $data = mysqli_fetch_array($data);
      session_start();
      $_SESSION['id_anggota'] = $data['id_anggota'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['nama_anggota'] = $data['nama_anggota'];
      header("location:user.php");
  } else {
    echo "<script>alert('Login User Gagal'); window.location.assign('login.php');</script>";
  }
}
}
?>
