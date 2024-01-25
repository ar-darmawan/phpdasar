<?php
// Koneksi ke database
function koneksi()
{
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "phpdasar";
  return mysqli_connect($host, $user, $password, $database);
}


function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }


  $datas = [];
  while ($data = mysqli_fetch_assoc($result)) {
    $datas[] = $data;
  }
  return $datas;
}

function tambah($input)
{
  $conn = koneksi();


  $nama = htmlspecialchars($input['nama']);
  $nim = htmlspecialchars($input['nim']);
  $email = htmlspecialchars($input['email']);
  $jurusan = htmlspecialchars($input['jurusan']);
  $gambar = htmlspecialchars($input['gambar']);

  $query =  "INSERT INTO
              mahasiswa
            VALUES ('', '$nama', '$nim','$email','$jurusan','$gambar')
            ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
