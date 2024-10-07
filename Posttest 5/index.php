<?php include('koneksi.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pesan Customer</title>
    <style type="text/css">
    * {
        font-family: "Trebuchet MS";
    }
    
    h1 {
        text-transform: uppercase;
        -webkit-text-fill-color: #FFA500; 
        -webkit-text-stroke: 1px #454545;
    }
    
    table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        margin: 10px auto 10px auto;
    }
    
    table thead th {
        background-color: #FFA500;
        border: solid 1px black;
        color: black;
        padding: 10px;
        text-align: center;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    
    table tbody td {
        border: solid 1px black;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    
    .a1 {
        background-color: blue;
        color: white;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
    }

    .a2 {
        background-color: red;
        color: white;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
    }
    </style>
</head>
<body>
    <center><h1>Pesan Customer</h1></center>

    <table>
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:10%">Nama</th>
                <th style="width:10%">Tanggal</th>
                <th style="width:5%">No Ponsel/WA</th>
                <th style="width:5%">Email</th>
                <th style="width:5%">Perihal</th>
                <th style="width:15%">Pesan</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM pesan ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if(!$result) {
                    die("Query Error : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $no; ?></td>
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
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>