<?php

session_start();

// If session already exists OR cookie exists, redirect to admin.php
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
} elseif (!isset($_SESSION['admin']) && isset($_COOKIE['admin_user'])) {
    $_SESSION['admin'] = $_COOKIE['admin_user'];
    header("Location: admin.php");
    exit;
}

$conn = mysqli_connect("localhost:3307", "root", "", "portfolio_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM user_login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
         if (!empty($_POST['remember'])) {
            setcookie("admin_user", $username, time() + (86400 * 7), "/"); // 7 days
        }
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
        <h1>Admin Login</h1><br>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <label><input type="checkbox" name="remember"> Remember Me</label><br><br>
            <button type="submit" name="login" class="btn">Login</button>
        </form>
       </div>
    </div>
</body>
</html>
