<?php
// Include the database connection file
include '../dbconnection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $subject = $_POST['subject'];
    $rental_type = $_POST['rental_type'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile_number = $_POST['mobile_number'];
    $email_address = $_POST['email_address'];
    $date_range = $_POST['date_range'];
    $message = $_POST['message'];
    
    // Check if privacy policy checkbox is checked
    $privacy_policy = isset($_POST['privacy_policy']) ? 1 : 0;
    if (!$privacy_policy) {
        echo "You must consent to the Privacy Policy to submit the form.";
        exit; // Exit the script if the checkbox is not checked
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO messages (subject, rental_type, first_name, last_name, mobile_number, email_address, date_range, message, privacy_policy)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $subject, $rental_type, $first_name, $last_name, $mobile_number, $email_address, $date_range, $message, $privacy_policy);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Message submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
