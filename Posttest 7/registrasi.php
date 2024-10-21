<?php
require "koneksi.php";

// Variabel untuk menyimpan pesan error
$error = "";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password
    $role = $_POST["role"];

    // Cek apakah username sudah digunakan
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Jika username sudah digunakan
        $error = "Username sudah digunakan! Silakan gunakan username lain.";
    } else {
        // Jika username belum digunakan, lanjutkan proses registrasi
        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

        if (mysqli_query($koneksi, $query)) {
            echo "
            <script>
            alert('Registrasi berhasil!');
            document.location.href = 'login.php';
            </script>";
        } else {
            echo "
            <script>
            alert('Registrasi gagal!');
            document.location.href = 'index.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>

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
            <h1 class="login-title">Registrasi</h1>
            <p class="login-description">Silakan Registrasi dulu</p>
        </hgroup>

        <form action="" method="post" class="login-form-container">
            <div class="login-form-group">
                <label for="username" class="login-form-title">Username</label>
                <input type="text" placeholder="Username" name="username" id="username" class="login-form-input" />
                <!-- Tampilkan pesan error jika username sudah digunakan -->
                <?php if (!empty($error)) { ?>
                    <span class="error-message"><?php echo $error; ?></span>
                <?php } ?>
            </div>
            <div class="login-form-group">
                <label for="password" class="login-form-title">Password</label>
                <input type="password" placeholder="Password" name="password" id="password" class="login-form-input" />
            </div>
            <div class="login-form-group">
                <label for="role" class="login-form-title">Role</label>
                <select name="role" id="role" class="login-form-input" required>
                    <option name="role" value="Admin">Admin</option>
                    <option name="role" value="User">User</option>
                </select>
            </div>

            <center><a href="login.php" class="belum">Sudah Punya Akun ?</a></center>

            <button type="submit" name="submit" class="login-button">Registrasi</button>
        </form>
    </section>
</body>

</html>
