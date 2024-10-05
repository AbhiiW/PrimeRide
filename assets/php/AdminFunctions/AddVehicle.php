<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_name = $_POST['vehicleName'];
    $model = $_POST['vehicleModel'];
    $seats = $_POST['seats'];
    $fuel_type = $_POST['fuelType'];
    $transmission = $_POST['transmission'];
    $license_plate = $_POST['licensePlate'];
    $target_dir = "../assets/vehicles/";
    
    // File upload logic
    $target_file = $target_dir . basename($_FILES["vehicleImage"]["name"]);
    move_uploaded_file($_FILES["vehicleImage"]["tmp_name"], $target_file);

    // Insert into database
    $sql = "INSERT INTO vehicles (vehicle_name, model, seats, fuel_type, transmission, license_plate, image_path)
            VALUES ('$vehicle_name', '$model', '$seats', '$fuel_type', '$transmission', '$license_plate', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Vehicle added successfully";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    $conn->close();
    header("Location:../../../../Pages/Dashboards/admindashboard.php");
}
?>
