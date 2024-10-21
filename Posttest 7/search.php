<?php
include('koneksi.php');

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

// Sanitasi input pencarian untuk menghindari SQL Injection
$query = isset($_GET['query']) ? mysqli_real_escape_string($koneksi, $_GET['query']) : '';

// Cek apakah ada query untuk pencarian
if ($query != "") {
    // Query untuk mencari data berdasarkan nama
    $sql = "SELECT * FROM pesan WHERE nama LIKE '%$query%' ORDER BY id ASC";
} else {
    // Query untuk menampilkan semua data jika pencarian kosong
    $sql = "SELECT * FROM pesan ORDER BY id ASC";
}

$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}

$no = 1; // Variabel untuk membuat nomor urut

// Jika data ditemukan
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td style='text-align: center;'><img src='gambar/" . $row['gambar'] . "' style='width: 100px;'></td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['ponsel'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['perihal'] . "</td>";
        echo "<td>" . substr($row['pesan'], 0, 150) . "</td>";
        echo "<td>
                <a class='a1' href='edit_pesan.php?id=" . $row['id'] . "'>&#128393; Edit</a> 
                <a class='a2' href='proses_hapus.php?id=" . $row['id'] . "' onclick='return confirm(\"Anda yakin akan menghapus data ini?\")'>&#128465; Hapus</a>
            </td>";
        echo "</tr>";
        $no++;
    }
} else {
    // Tampilkan pesan jika tidak ada data yang ditemukan
    echo "<tr><td colspan='9'>Data tidak ditemukan</td></tr>";
}
?>
