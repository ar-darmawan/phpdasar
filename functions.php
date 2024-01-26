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

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($input)
{
  $conn = koneksi();

  $id = $input['id'];
  $nama = htmlspecialchars($input['nama']);
  $nim = htmlspecialchars($input['nim']);
  $email = htmlspecialchars($input['email']);
  $jurusan = htmlspecialchars($input['jurusan']);
  $gambar = htmlspecialchars($input['gambar']);

  $query =  "UPDATE mahasiswa SET 
            nama = '$nama',
            nim = '$nim',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa 
            WHERE nama LIKE '%$keyword%' OR
                  nim LIKE '%$keyword%' OR
                  jurusan LIKE '%$keyword%' OR
                  email LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);
  $datas = [];
  while ($data = mysqli_fetch_assoc($result)) {
    $datas[] = $data;
  }
  return $datas;
}
