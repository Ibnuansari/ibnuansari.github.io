<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $tanggal = $_POST['tanggal'];
  $ponsel = $_POST['ponsel'];
  $email = $_POST['email'];
  $perihal = $_POST['perihal'];
  $pesan = $_POST['pesan'];

// jalankan query UPDATE berdasarkan ID yang produknya kita edit
$query  = "UPDATE pesan SET nama = '$nama', tanggal = '$tanggal', ponsel = '$ponsel', email = '$email', perihal = '$perihal', pesan = '$pesan'";
$query .= "WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

// periska query apakah ada error
if(!$result){
  die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
    " - ".mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}

