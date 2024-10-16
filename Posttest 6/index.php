<?php
include('koneksi.php'); 

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pesan</title>
    <style type="text/css">
    * {
        font-family: "Trebuchet MS";
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    
    h1 {
        text-transform: uppercase;
        -webkit-text-fill-color: #FFA500; 
        -webkit-text-stroke: 1px #454545;
        margin-bottom: 20px;
    }
    
    .table-container {
        overflow-x: auto;
        flex-grow: 1;
        max-height: calc(100vh - 150px);
    }
    
    table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        width: 100%;
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

    .listing-buttons {
        margin-top: 20px;
    }

    .btn {
        padding: 10px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        font-size: 14px;
    }

    .btn-detail {
        background-color: #FFA500;
        color: white;
        border: 1px solid #454545;
    }
    </style>
</head>
<body>
    <center><h1>Data Pesan</h1></center>
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
            <tbody>
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM pesan ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if(!$result){
                    die ("Query Error: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
                }

                $no = 1; //variabel untuk membuat nomor urut

                while($row = mysqli_fetch_assoc($result))
                {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 100px;"></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['ponsel']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['perihal']; ?></td>
                    <td><?php echo substr($row['pesan'], 0, 150); ?></td>
                    <td>
                        <a class="a1" href="edit_pesan.php?id=<?php echo $row['id']; ?>">&#128393; Edit</a> 
                        <a class="a2" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">&#128465; Hapus</a>
                    </td>
                </tr>

                <?php
                $no++; //untuk nomor urut terus bertambah 1
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="listing-buttons">
        <a href="index.html" class="btn btn-detail"><< Kembali</a>
    </div>
</body>
</html>
