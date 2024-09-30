<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-section {
            background-color: #ffc107;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #ffffff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .submit-btn {
            background-color: #ffffff;
            color: #ffc107;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .submit-btn:hover {
            background-color: #333;
            color: #ffffff;
        }
        .result-section {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .output-table {
            width: 100%;
            border-collapse: collapse;
        }
        .output-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .output-table tr:last-child td {
            border-bottom: none;
        }
        .output-table td:first-child {
            width: 30%;
            font-weight: bold;
            color: #333;
        }
        .output-table td:last-child {
            width: 70%;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Fungsi untuk membersihkan input
            function clean_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $nama = clean_input($_POST['nama'] ?? '');
            $tanggal = clean_input($_POST['tanggal'] ?? '');
            $ponsel = clean_input($_POST['ponsel'] ?? '');
            $email = clean_input($_POST['email'] ?? '');
            $perihal = clean_input($_POST['perihal'] ?? '');
            $pesan = clean_input($_POST['pesan'] ?? '');

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
        } else {
        ?>
        <div class="form-section">
            <h1>Hubungi Kami</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <input type="text" name="nama" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <input type="date" name="tanggal" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="ponsel" placeholder="Ponsel/WA" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Alamat e-Mail" required>
                </div>
                <div class="form-group">
                    <select name="perihal" required>
                        <option value="">Perihal</option>
                        <option value="Info Rumah">Info Rumah</option>
                        <option value="Booking Rumah">Booking Rumah</option>
                        <option value="Jadwal Kunjungan">Jadwal Kunjungan</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="pesan" placeholder="Ketik Pesan Anda" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">KIRIM</button>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>