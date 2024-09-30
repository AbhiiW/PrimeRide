<?php
session_start();
include 'dbconnection.php';

function createStaffUser($conn, $username, $email, $password) {
    
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        $_SESSION['error_message'] = "Failed to prepare the SQL statement.";
        return false;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    $success = $stmt->execute();

    if ($success) {
        $_SESSION['success_message'] = "Staff login created successfully!";
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    
    $stmt->close();
    return $success;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error_message'] = "All fields are required.";
        header("Location: ../../Pages/signup.php");
        exit();
    }

    if (createStaffUser($conn, $username, $email, $password)) {
        header("Location: ../../Pages/signup.php");
        exit();
    } else {
        header("Location: ../../Pages/signup.php");
        exit();
    }
}

$conn->close();
?>
