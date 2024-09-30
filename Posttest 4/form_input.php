<?php
// Gunakan include/require untuk menambah kode atau file eksternal
require 'hasil_input.php';

// Fungsi untuk membersihkan input pengguna
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = clean_input($_POST['nama'] ?? '');
    $tanggal = clean_input($_POST['tanggal'] ?? '');
    $ponsel = clean_input($_POST['ponsel'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $perihal = clean_input($_POST['perihal'] ?? '');
    $pesan = clean_input($_POST['pesan'] ?? '');

    // Menampilkan hasil input
    echo "<div class='container'>";
    echo "<div class='form-section'>";
    echo "<h2>Pesan Dari:</h2>";
    echo "<div class='result-section'>";
    echo "<table class='output-table'>";
    echo "<tr><td>Nama :</td><td>" . $nama . "</td></tr>";
    echo "<tr><td>Tanggal :</td><td>" . $tanggal . "</td></tr>";
    echo "<tr><td>Ponsel/WA :</td><td>" . $ponsel . "</td></tr>";
    echo "<tr><td>Email :</td><td>" . $email . "</td></tr>";
    echo "<tr><td>Perihal :</td><td>" . $perihal . "</td></tr>";
    echo "<tr><td>Pesan :</td><td>" . nl2br($pesan) . "</td></tr>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<p>Form tidak diisi dengan benar.</p>";
}
?>