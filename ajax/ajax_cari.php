<?php
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);
?>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>No.</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>

  <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan='4'>
        <p>DATA TIDAK DITEMUKAN</p>
      </td>
    </tr>
  <?php endif; ?>

  <?php $i = 1;
  foreach ($mahasiswa as $data) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $data["gambar"]; ?>"></td>
      <td><?= $data["nama"]; ?></td>
      <td>
        <a href="detail.php?id=<?= $data['id']; ?>">lihat detail</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>