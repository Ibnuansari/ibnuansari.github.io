<?php 
include 'koneksi.php';

session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['role'])) {
    echo "
        <script>
        alert('Anda harus login terlebih dahulu!');
        document.location.href = 'index.php';
        </script>
    ";
    exit(); // Menghentikan eksekusi jika tidak ada session
}

$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM pesan WHERE id='$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }
