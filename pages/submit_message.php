<?php
$conn = mysqli_connect("localhost:3307", "root", "", "portfolio_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.php#contact';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
