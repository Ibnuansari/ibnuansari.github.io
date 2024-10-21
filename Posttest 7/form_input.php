<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

date_default_timezone_set('Asia/Makassar');

// membuat variabel untuk menampung data dari form
$gambar = $_FILES['gambar']['name'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$ponsel = $_POST['ponsel'];
$email = $_POST['email'];
$perihal = $_POST['perihal'];
$pesan = $_POST['pesan'];

// cek dulu jika ada gambar produk jalankan coding ini
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); // ekstensi file gambar yang diperbolehkan
    $x = explode('.', $gambar); // memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $current_timestamp = date('Y-m-d H.i.s'); // Format timestamp: yyyy-mm-dd hh.mm.ss
    $nama_gambar_baru = $current_timestamp . '.' . $ekstensi; // menggabungkan timestamp dengan ekstensi file
    $ukuran_file = $_FILES['gambar']['size']; // mendapatkan ukuran file

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        // Cek ukuran file (maksimal 1 MB)
        if($ukuran_file <= 1000000) { // 1000000 Bytes = 1 MB
            // pindahkan file gambar ke folder gambar
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

            // jalankan query INSERT untuk menambah data ke database
            $query = "INSERT INTO pesan (nama, tanggal, ponsel, email, gambar, perihal, pesan) VALUES ('$nama', '$tanggal', '$ponsel', '$email', '$nama_gambar_baru', '$perihal', '$pesan')";
            $result = mysqli_query($koneksi, $query);

            // periksa query apakah ada error
            if(!$result) {
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else {
                // tampilkan alert dan redirect ke halaman home.php
                echo "<script>alert('Data berhasil ditambah.');window.location='home.php';</script>";
            }
        } else {
            // jika ukuran file lebih dari 1 MB, tampilkan alert ini
            echo "<script>alert('Ukuran gambar terlalu besar. Maksimal 1 MB.');window.location='home.php';</script>";
        }
    } else {
        // jika file ekstensi tidak jpg atau png, tampilkan alert ini
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='home.php';</script>";
    }
} else {
    // jika tidak ada gambar yang diupload, set kolom gambar ke NULL
    $query = "INSERT INTO pesan (nama, tanggal, ponsel, email, gambar, perihal, pesan) VALUES ('$nama', '$tanggal', '$ponsel', '$email', NULL, '$perihal', '$pesan')";
    $result = mysqli_query($koneksi, $query);

    // periksa query apakah ada error
    if(!$result) {
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        // tampilkan alert dan redirect ke halaman home.php
        echo "<script>alert('Data berhasil ditambah.');window.location='home.php';</script>";
    }
}
?>