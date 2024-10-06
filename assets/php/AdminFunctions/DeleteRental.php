<?php
include '../dbconnection.php'; // Ensure to include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rental_id = $_POST['rental_id'];

    // First, fetch the receipt URL to know which file to delete
    $sql = "SELECT receipt_url FROM rental WHERE rental_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rental_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $receiptUrl = "../../Photo/Paymentreciepts/" . $row['receipt_url']; // Updated path

        // Attempt to delete the receipt file only if the URL is not empty
        if (!empty($row['receipt_url']) && file_exists($receiptUrl)) {
            unlink($receiptUrl); // Delete the file
        }
    }

    // Now, delete the rental record
    $sql = "DELETE FROM rental WHERE rental_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rental_id);

    if ($stmt->execute()) {
        echo "Booking and receipt deleted successfully.";
        // Redirect or show a success message
        header("Location: ../../../admin/bookingmanagement.php"); // Corrected redirection
        exit; // Ensure to exit after redirection
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
