<?php
include '../dbconnection.php';

// Update status if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rental_id = $_POST['rental_id'];
    $rental_status = $_POST['rental_status'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE rental SET rental_status = ? WHERE rental_id = ?");
    $stmt->bind_param("si", $rental_status, $rental_id);

    if ($stmt->execute()) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();

// Redirect back to the bookings page
header("Location:../../../admin/bookingmanagement.php ");
exit;
?>
