<?php

$server = "localhost";
$root = "root";
$pass  = "";
$db = "db_perpustakaan";
$koneksi = mysqli_connect( $server, $root, $pass, $db);
if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());

}