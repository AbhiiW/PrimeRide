<?php
// Include the database connection
include '../dbconnection.php';

// Fetch customer details by session (assuming customer is logged in)
function getCustomerProfile($client_id) {
    global $conn;
    $sql = "SELECT first_name, last_name, email, phone_number, profile_picture FROM clients WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Update profile details
function updateProfile($client_id, $first_name, $last_name, $phone_number, $profile_picture) {
    global $conn;
    
    // Handle profile picture upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "assets/images/profile_pictures/";
        $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture);
    }

    $sql = "UPDATE clients SET first_name = ?, last_name = ?, phone_number = ?, profile_picture = ? WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $first_name, $last_name, $phone_number, $profile_picture, $client_id);
    return $stmt->execute();
}

// Change password function
function changePassword($client_id, $current_password, $new_password) {
    global $conn;

    // Get current password from DB
    $sql = "SELECT password FROM clients WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $client = $result->fetch_assoc();

    // Verify current password
    if (password_verify($current_password, $client['password'])) {
        // Hash the new password
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Update password
        $sql = "UPDATE clients SET password = ? WHERE client_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_password_hashed, $client_id);
        return $stmt->execute();
    } else {
        return false; // Password does not match
    }
}

// Fetch orders by customer
function getPlacedOrders($client_id) {
    global $conn;
    $sql = "SELECT * FROM orders WHERE client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    return $stmt->get_result();
}

// Fetch customer messages and replies from staff/admin
function getCustomerMessages($client_id) {
    global $conn;
    $sql = "SELECT m.message, m.reply, m.created_at FROM messages m WHERE m.client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    return $stmt->get_result();
}

?>

