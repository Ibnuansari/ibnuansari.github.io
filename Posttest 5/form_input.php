<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$ponsel = $_POST['ponsel'];
$email = $_POST['email'];
$perihal = $_POST['perihal'];
$pesan = $_POST['pesan'];

$query = "INSERT INTO pesan (nama, tanggal, ponsel, email, perihal, pesan) VALUES ('$nama', '$tanggal', '$ponsel', '$email', '$perihal', '$pesan')";
$result = mysqli_query($koneksi, $query);

// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    echo "<script>alert('Berhasil mengirim pesan.');window.location='index.html';</script>";
}
