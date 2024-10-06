<?php
session_start();
include '../dbconnection.php';

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$profile_picture = $_FILES['profile_picture'];

if ($password !== $confirm_password) {
    $_SESSION['error'] = 'Passwords do not match.';
    header('Location: ../../../authentication.php');
    exit();
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$checkUser = $conn->prepare("SELECT * FROM clients WHERE username = ? OR email = ?");
$checkUser->bind_param("ss", $username, $email);
$checkUser->execute();
$result = $checkUser->get_result();

if ($result->num_rows > 0) {
    $_SESSION['error'] = 'Username or email already exists.';
    header('Location: ../../../authentication.php');
} else {
    $profile_picture_name = 'default.jpg';
    if ($profile_picture['size'] > 0) {
        $profile_picture_name = time() . "_" . basename($profile_picture["name"]);
        $target_dir = "../../database/user-profiles-pic/";
        $target_file = $target_dir . $profile_picture_name;
        move_uploaded_file($profile_picture["tmp_name"], $target_file);
    }

    $stmt = $conn->prepare("INSERT INTO clients (username, name, email, password, profile_picture) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $name, $email, $hashed_password, $profile_picture_name);
    if ($stmt->execute()) {
        echo "<script>
                alert('Signup successful.');
                setTimeout(function() {
                    window.location.href = '../../../authentication.php?showLogin=true';
                }, 5000);
              </script>";
    } else {
        $_SESSION['error'] = 'Signup failed. Please try again.';
        header('Location: ../../../authentication.php');
    }
}
?>