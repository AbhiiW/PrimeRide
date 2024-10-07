<?php
include '../dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title']; 
    $description = $_POST['description']; 

    // Validate the price fields (ensure they are numeric)
    if (isset($_POST['price']) && is_numeric($_POST['price'])) {
        $price = number_format(floatval($_POST['price']), 2, '.', ''); // Format to two decimal places
    } else {
        die("Invalid price input.");
    }

    if (isset($_POST['original_price']) && is_numeric($_POST['original_price'])) {
        $original_price = number_format(floatval($_POST['original_price']), 2, '.', ''); // Format to two decimal places
    } else {
        die("Invalid original price input.");
    }

    // Handle the image upload (required for adding a new offer)
    if ($_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
        $image_path = $_FILES['image_path']['name'];
        // Use absolute path to avoid issues with relative paths
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/PrimeRide/assets/Photo/Offerimg/";
        $target_file = $target_dir . basename($image_path);

        // Ensure directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file)) {
            // Image upload was successful, continue with inserting into the database
        } else {
            die("Error uploading the image file.");
        }
    } else {
        die("Image upload is required.");
    }

    // Prepare the SQL query to insert the new offer data
    $sql = "INSERT INTO offers (title, description, price, original_price, image_path) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the SQL query
    $stmt->bind_param("ssdds", $title, $description, $price, $original_price, $image_path);

    // Execute the query and check if the insertion is successful
    if ($stmt->execute()) {
        // Redirect to the offer management page upon successful insertion
        header("Location:../../../admin/Promotions.php?message=OfferAdded");
        exit();
    } else {
        // Display an error if the query execution fails
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
