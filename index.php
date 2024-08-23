<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } elseif ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: berhasil_login.php");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PBO</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 25px 30px;
        }

        .login-email {
            width: 100%;
        }

        .login-text {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 2rem;
            font-weight: 800;
        }

        .input-group {
            width: 100%;
            margin-bottom: 25px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
        }

        .input-group input:focus {
            border-color: #3e8ed0;
        }

        .btn {
            width: 100%;
            padding: 10px 15px;
            background-color: #3e8ed0;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #3277a8;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
            <button name="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>


