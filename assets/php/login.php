<?php
session_start();
include 'dbconnection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['success_message'] = "Login successful. Welcome, " . $row['name'] . "to the Gallery Cafe!!";
            $_SESSION['login_success'] = true;
            header("Location: ../../Pages/login.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid password.";
        }
    } else {
        $_SESSION['error_message'] = "No user found with this email.";
    }
}

$conn->close();
header("Location: ../../Pages/login.php");
exit();
?>
