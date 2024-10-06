<?php
session_start();
include '../dbconnection.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the client ID from the session
    $client_id = $_SESSION['client_id'];

    // Get the new password and confirmation from POST data
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    // Check if both passwords match
    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match.";
        header("Location: ../profile.php");
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE clients SET password = ? WHERE client_id = ?");
    $stmt->bind_param("si", $hashed_password, $client_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Password updated successfully.";
    } else {
        $_SESSION['error_message'] = "Error updating password.";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the profile page
    header("Location: ../../../profile.php");
    exit();
}
?>
