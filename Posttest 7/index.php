<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pesan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style type="text/css">
    * {
        font-family: "Trebuchet MS";
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        padding-top: 60px;
    }

    /* Navbar styles */
    .navbar {
        background-color: #333;
        position: fixed;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        z-index: 1000;
    }

    .navbar a {
        color: white;
        text-decoration: none;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .navbar-brand {
        font-size: 1.5em;
        font-weight: bold;
    }
    
    .table-container {
        overflow-x: auto;
        flex-grow: 1;
        max-height: calc(100vh - 150px);
    }
    
    table {
        margin: 10px 30px;
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        width: 90%;
        margin-bottom: 20px;
    }
    
    table thead th {
        background-color: #FFA500;
        border: solid 1px black;
        color: black;
        padding: 10px;
        text-align: center;
        text-shadow: 1px 1px 1px #fff;
        position: sticky;
        top: 0;
    }
    
    table tbody td {
        border: solid 1px black;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    
    .a1, .a2 {
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        font-size: 12px;
        border-radius: 3px;
        display: inline-block;
        margin: 2px;
    }

    .a1 {
        background-color: blue;
    }

    .a2 {
        background-color: red;
    }

    .logout {
        width: 30px;
        height: 30px;
    }
    
    form {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    form input[type="text"] {
        width: 300px;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px 0 0 4px;
        outline: none;
    }

    form button {
        padding: 10px 15px;
        background-color: #FFA500;
        border: none;
        color: white;
        font-size: 14px;
        cursor: pointer;
        border-radius: 0 4px 4px 0;
        outline: none;
    }

    form button:hover {
        background-color: #ff8c00;
    }
    </style>

    <!-- JQuery dan AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Saat mengetik di input pencarian
            $('#search').on('keyup', function() {
                var query = $(this).val(); // Ambil nilai input
                $.ajax({
                    url: "search.php", // Arahkan ke file PHP yang memproses pencarian
                    method: "GET",
                    data: { query: query }, // Kirimkan query pencarian ke file PHP
                    success: function(data) {
                        $('#table-data').html(data); // Hasil pencarian ditampilkan dalam tabel
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error); // Tampilkan error jika terjadi kesalahan
                    }
                });
            });

            // Cegah form dari submit (refresh halaman)
            $('form').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>

</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand">Cassamora Hills</a>
        <div class="navbar-links">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <br><center><h1>Data Pesan</h1></center>

    <form action="" method="GET">
        <input type="text" id="search" name="query" placeholder="Cari nama..." autocomplete="off">
    </form>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>No hp/Wa</th>
                    <th>Email</th>
                    <th>Perihal</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="table-data">
                <!-- Data pencarian akan dimuat di sini -->
            </tbody>
        </table>
    </div>
</body>
</html>
