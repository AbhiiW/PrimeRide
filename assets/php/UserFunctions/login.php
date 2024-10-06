<?php
session_start();
include '../dbconnection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM clients WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        setcookie('username', $user['username'], time() + (86400 * 30), "/");
        header('Location: ../../../profile.php');
    } else {
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: ../../../authentication.php');
    }
} else {
    $_SESSION['error'] = 'Invalid username or password.';
    header('Location: ../../../authentication.php');
}
?>