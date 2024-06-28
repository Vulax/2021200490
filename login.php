<?php
session_start();
include 'config.php';

// Provera ako je već prijavljen korisnik
if (isset($_SESSION['username'])) {
    header("Location: racun/list.php");
    exit();
}

// Provera login podataka
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = MD5(?)");
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: racun/list.php");
        exit();
    } else {
        echo '<script>alert("Neispravni kredincijali.")</script>';
    }

    $stmt->close();

    /*
    // Stavio sam za primer da kredincijali budu admin i password.
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['username'] = $username;
        header("Location: racun/list.php");
        exit();
    } else {
                echo '<script>alert("Neispravni kredincijali.")</script>';
            
    }
                */
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava - Banka</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }
        .login-form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login-form h2 {
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 3px;
        }
        .btn-login {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .btn-login:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2 class="text-center">Prijava u Bankarski Sistem</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Korisničko ime:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Lozinka:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block btn-login">Prijavi se</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

