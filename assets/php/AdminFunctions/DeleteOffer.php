<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Offer ID

    // Fetch the current image path from the database
    $sql = "SELECT image_path FROM offers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    
    // Check if the offer exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($image_path);
        $stmt->fetch();
        
        // Close the first statement
        $stmt->close();

        // Prepare the DELETE statement
        $sql = "DELETE FROM offers WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        // Execute the delete query
        if ($stmt->execute()) {
            // Define the image path and delete the image if it exists
            $target_file = "../../assets/Photo/Offerimg/" . $image_path;
            if (file_exists($target_file)) {
                unlink($target_file); // Delete the image file
            }

            // Redirect or display success message
            echo "Offer deleted successfully.";
        } else {
            // Handle error if the delete query fails
            echo "Error deleting offer: " . $stmt->error;
        }
    } else {
        // If the offer does not exist
        echo "Offer not found.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to the offers management page
    header("Location: ../../../admin/Promotions.php");
    exit();
}
?>
