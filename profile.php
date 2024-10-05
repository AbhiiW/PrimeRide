<?php
session_start();
include '../dbconnection.php';

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form, and sanitize the input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Password will be hashed, so no need to sanitize

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            // Store user data in session
            $_SESSION['client_id'] = $row['client_id'];
            $_SESSION['client_name'] = $row['first_name'] . " " . $row['last_name'];
            $_SESSION['success_message'] = "Login successful. Welcome, " . $_SESSION['client_name'] . " to Prime Ride!";
            $_SESSION['login_success'] = true;

            // Update the last login time in the database
            $update_last_login = $conn->prepare("UPDATE clients SET last_login = NOW() WHERE client_id = ?");
            $update_last_login->bind_param("i", $row['client_id']);
            $update_last_login->execute();
            $update_last_login->close();

            // Redirect to profile page
            header("Location: ../../Pages/profile.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid password.";
            header("Location: ../../Pages/login.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "No user found with this email.";
        header("Location: ../../Pages/login.php");
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
