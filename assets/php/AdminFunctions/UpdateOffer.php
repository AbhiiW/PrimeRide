<?php
include '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $original_price = $_POST['original_price'];

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        // Fetch the current image path from the database
        $sql = "SELECT image_path FROM offers WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $existingImage = $row['image_path'];
        
        // Delete the old image file from the server
        $oldImagePath = "../../Photo/Offerimg/" . $existingImage;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);  // Delete the old image file
        }

        // Handle new image upload
        $image = $_FILES['image']['name'];
        $target = "../../Photo/Offerimg/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        // Update query with the new image
        $sql = "UPDATE offers SET title='$title', description='$description', price='$price', original_price='$original_price', image_path='$image' WHERE id='$id'";
    } else {
        // Update query without changing the image
        $sql = "UPDATE offers SET title='$title', description='$description', price='$price', original_price='$original_price' WHERE id='$id'";
    }

    // Perform the update operation
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../../admin/Promotions.php"); 
    } else {
        echo "Error updating offer: " . $conn->error;
    }

    $conn->close();
}
?>
