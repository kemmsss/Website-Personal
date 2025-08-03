<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['admin'] = $data['username'];
        header("Location: dashboard/index.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Prokompim</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: url('public/assets/foto beranda.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1.2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 40px 30px;
            border-radius: 15px;
            width: 350px;
            color: #fff;
            box-shadow: 0 0 25px rgba(0,0,0,0.3);
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        .login-container img.logo {
            width: 80px;
            margin-bottom: 15px;
        }

        .login-container h2 {
            margin-bottom: 25px;
            color: #fff;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.7);
            color: #000;
            font-size: 14px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            background: rgba(255, 0, 0, 0.4);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        @media (max-width: 400px) 
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }

.login-container img.logo {
    width: 100px; /* ubah sesuai kebutuhan */
    margin-bottom: 15px;
}

    </style>
</head>
<body>
    <div class="login-container">
        <img src="public/assets/logo_kiri.webp" alt="Logo" class="logo">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Sing in">
        </form>
    </div>
</body>
</html>
