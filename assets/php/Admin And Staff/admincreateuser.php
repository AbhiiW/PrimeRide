<?php
function createUserLogin($username, $email, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        return "User login created successfully.";
    } else {
        return "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
