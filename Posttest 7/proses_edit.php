<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

date_default_timezone_set('Asia/Makassar');

// membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$ponsel = $_POST['ponsel'];
$email = $_POST['email'];
$perihal = $_POST['perihal'];
$pesan = $_POST['pesan'];
$gambar = $_FILES['gambar']['name'];

//cek dulu jika merubah gambar produk jalankan coding ini
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $current_timestamp = date('Y-m-d H.i.s'); // Format timestamp: yyyy-mm-dd hh.mm.ss
    $nama_gambar_baru = $current_timestamp . '.' . $ekstensi; // menggabungkan timestamp dengan ekstensi file
    
    // Cek ukuran file (maksimal 1 MB)
    if ($_FILES['gambar']['size'] <= 1000000) { // 1000000 Bytes = 1 MB
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
            
            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query  = "UPDATE pesan SET nama = '$nama', tanggal = '$tanggal', ponsel = '$ponsel', email = '$email', perihal = '$perihal', pesan = '$pesan', gambar = '$nama_gambar_baru'";
            $query .= "WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);
            
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_pesan.php';</script>";
        }
    } else {
        //jika ukuran file lebih dari 1 MB
        echo "<script>alert('Ukuran gambar terlalu besar (maksimal 1 MB).');window.location='edit_pesan.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = "UPDATE pesan SET nama = '$nama', tanggal = '$tanggal', ponsel = '$ponsel', email = '$email', perihal = '$perihal', pesan = '$pesan'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
?>