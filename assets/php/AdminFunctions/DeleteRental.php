<?php
include '../dbconnection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rental_id = $_POST['rental_id'];

    
    $sql = "SELECT receipt_url FROM rental WHERE rental_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rental_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $receiptUrl = "../../Photo/Paymentreciepts/" . $row['receipt_url']; 

        
        if (!empty($row['receipt_url']) && file_exists($receiptUrl)) {
            unlink($receiptUrl); 
        }
    }

   
    $sql = "DELETE FROM rental WHERE rental_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rental_id);

    if ($stmt->execute()) {
        echo "Booking and receipt deleted successfully.";
        
        header("Location: ../../../admin/bookingmanagement.php"); 
        exit; 
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
