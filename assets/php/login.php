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

    $stmt = $conn->prepare("SELECT * FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['success_message'] = "Login successful. Welcome, " . $row['name'] . " to the Gallery Cafe!";
            $_SESSION['login_success'] = true;
            header("Location: ../../Pages/login.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid password.";
        }
    } else {
        $_SESSION['error_message'] = "No user found with this email.";
    }

    $stmt->close();
}

$conn->close();
header("Location: ../../Pages/login.php");
exit();
?>
