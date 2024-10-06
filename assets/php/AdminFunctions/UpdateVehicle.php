<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $vehicle_name = $_POST['vehicle_name'];
    $model = $_POST['model'];
    $seats = $_POST['seats'];
    $fuel_type = $_POST['fuel_type'];
    $transmission = $_POST['transmission'];
    $license_plate = $_POST['license_plate'];

   
    $sql = "SELECT image_path FROM vehicles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($current_image_path);
    $stmt->fetch();
    $stmt->close();

    
    if ($_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
    
        $target_dir = "../../Photo/Vehicleimg/";
        $old_image_path = $target_dir . $current_image_path;
        
        if (file_exists($old_image_path)) {
            unlink($old_image_path); // Delete the old image file 
        }

        
        $image_path = $_FILES['image_path']['name'];
        $target_file = $target_dir . basename($image_path);
        move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file);

        // Update the database with the new image path
        $sql = "UPDATE vehicles SET vehicle_name = ?, model = ?, seats = ?, fuel_type = ?, transmission = ?, license_plate = ?, image_path = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiisssi", $vehicle_name, $model, $seats, $fuel_type, $transmission, $license_plate, $image_path, $id);
    } else {
        // If no new image is uploaded, just update the other details
        $sql = "UPDATE vehicles SET vehicle_name = ?, model = ?, seats = ?, fuel_type = ?, transmission = ?, license_plate = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiissi", $vehicle_name, $model, $seats, $fuel_type, $transmission, $license_plate, $id);
    }

    
    if ($stmt->execute()) {
        
        //  success message 
    } else {
        // Error Handling
    }

    // Clean up
    $stmt->close();
    $conn->close();

    // Redirect back to the vehicle management page
    header("Location:../../../admin/vehiclemanagement.php");
    exit();
}
?>
