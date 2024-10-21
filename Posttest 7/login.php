<?php
session_start();
require "koneksi.php";

// Variabel untuk menyimpan pesan error
$error = "";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk mendapatkan data user berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah username ditemukan
    if (mysqli_num_rows($result) === 1) {
        // Ambil data pengguna
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Cek role pengguna
            if ($user['role'] === 'Admin') {
                $_SESSION['role'] = 'admin'; // session untuk admin
                echo "
                    <script>
                    alert('Login berhasil! Selamat datang Admin.');
                    document.location.href = 'index.php';
                    </script>
                    ";
            } else {
                $_SESSION['role'] = 'user'; // session untuk user
                echo "
                    <script>
                    alert('Login berhasil! Selamat datang $username.');
                    document.location.href = 'home.php';
                    </script>
                    ";
            }
        } else {
            // Jika password salah
            $error = "Password salah!";
        }
    } else {
        // Jika username tidak ditemukan
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-title {
        font-size: 32px;
        font-weight: 800;
        margin: 0;
        text-align: center;
        margin-bottom: 5px;
    }

    .login-description {
        font-size: 20px;
        text-align: center;
        margin: 0;
        margin-bottom: 25px;
    }

    .login-card {
        border: 1px solid rgb(220, 220, 220);
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    }

    .login-form-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .login-form-title {
        font-size: 20px;
        font-weight: 700;
    }

    .login-form-group {
        display: flex;
        flex-direction: column;
        gap: 5.5px;
    }

    .login-form-input {
        border: 1px solid grey;
        height: 35px;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 18px;
        outline: none;
        border-radius: 20px;
    }

    .login-button {
        border: 0;
        font-size: 18px;
        font-weight: 700;
        padding-top: 8px;
        padding-bottom: 8px;
        border-radius: 25px;
        background-color: #FFA500;
        color: white;
    }

    .error-message {
        color: red;
        font-size: 14px;
    }
</style>

<body>
    <section class="login-card">
        <hgroup>
            <h1 class="login-title">Login</h1>
            <p class="login-description">Silakan login untuk masuk ke halaman website</p>
        </hgroup>

        <form action="" method="post" class="login-form-container">
            <div class="login-form-group">
                <label for="username" class="login-form-title">Username</label>
                <input type="text" placeholder="Username" name="username" id="username" class="login-form-input" />
                <!-- Tampilkan pesan error jika username tidak ditemukan -->
                <?php if (!empty($error) && $error === "Username tidak ditemukan!") { ?>
                    <span class="error-message"><?php echo $error; ?></span>
                <?php } ?>
            </div>

            <div class="login-form-group">
                <label for="password" class="login-form-title">Password</label>
                <input type="password" placeholder="Password" name="password" id="password" class="login-form-input" />
                <!-- Tampilkan pesan error jika password salah -->
                <?php if (!empty($error) && $error === "Password salah!") { ?>
                    <span class="error-message"><?php echo $error; ?></span>
                <?php } ?>
            </div>

            <center><a href="registrasi.php">Belum Punya Akun ? Registrasi!</a></center>

            <button type="submit" name="submit" class="login-button">LOGIN</button>
        </form>
    </section>
</body>

</html>