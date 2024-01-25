<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "phpdasar";

$conn = mysqli_connect($host, $user, $password, $database);

// Ambil data dari tabel mahasiswa / atau Query
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data(fetch) MAHASISWA dari object Result
// while ($mhs = mysqli_fetch_assoc($result))

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
    </tr>

    <?php $i = 1 ?>
    <?php while ($data = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="">Ubah</a> |
          <a href="">Hapus</a>
        </td>
        <td><img src="img/<?= $data["gambar"]; ?>"></td>
        <td><?= $data["nim"]; ?></td>
        <td><?= $data["nama"]; ?></td>
        <td><?= $data["email"]; ?></td>
        <td><?= $data["jurusan"]; ?></td>
      </tr>
      <?php $i++; ?>
    <?php endwhile; ?>
  </table>
</body>

</html>