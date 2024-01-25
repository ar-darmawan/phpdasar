<?php
require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$data = query("SELECT * FROM mahasiswa WHERE id = $id");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $data['gambar']; ?>"></li>
    <li>Nim : <?= $data['nim']; ?></li>
    <li>Nama : <?= $data['nama']; ?></li>
    <li>Email : <?= $data['email']; ?></li>
    <li>Jurusan : <?= $data['jurusan']; ?></li>
    <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
    <li><a href="index.php">Kembali ke daftar mahasiswa</a></li>
  </ul>
</body>

</html>