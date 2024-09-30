<?php
session_start();
include '../dbconnection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM staff WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['success_message'] = "Login successful. Welcome, " . $row['name'] . "!";
            $_SESSION['login_success'] = true;
            header("Location:../../../Pages/Dashboards/staffdashboard.html");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid password.";
        }
    } else {
        $_SESSION['error_message'] = "No staff member found with this username.";
    }
}

$conn->close();
header("Location: ../../Pages/stafflogin.php");
exit();
?>
