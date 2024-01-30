<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

require 'functions.php';

// ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h3>Form Login</h3>
  <?php if (isset($login['error'])) : ?>
    <p><?= $login['pesan']; ?></p>
  <?php endif; ?>
  <form action="" method="POST">
    <ul>
      <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" autofocus autocomplete="off" required>
      </li>
      <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
      <li>
        <a href="registrasi.php">Tambah User Baru</a>
      </li>
    </ul>;
  </form>
</body>

</html>