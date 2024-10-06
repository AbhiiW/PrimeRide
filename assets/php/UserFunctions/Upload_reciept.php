<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $rental_id = (int)$_POST['rental_id'];

    
    if (isset($_FILES['receipt']) && $_FILES['receipt']['error'] == UPLOAD_ERR_OK) {
        $receipt_path = $_FILES['receipt']['name'];
        $target_dir = "../../Photo/Paymentreciepts/"; 
        $target_file = $target_dir . basename($receipt_path);
        
        
        if (move_uploaded_file($_FILES['receipt']['tmp_name'], $target_file)) {
            
            $sql = "UPDATE rental SET receipt_url = ? WHERE rental_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $target_file, $rental_id); 
            
            if ($stmt->execute()) {
                // Redirect to the desired page after successful upload
                header("Location:../../../profile.php"); 
                exit();
            } else {
                echo "Error updating rental: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error moving the uploaded receipt file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}

$conn->close();
?>

