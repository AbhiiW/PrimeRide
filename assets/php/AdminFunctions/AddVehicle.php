<?php
include '../dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_name = $_POST['vehicle_name'];
    $model = $_POST['model'];
    $seats = $_POST['seats'];
    $fuel_type = $_POST['fuel_type'];
    $transmission = $_POST['transmission'];
    $license_plate = $_POST['license_plate'];

    $image_path = $_FILES['image_path']['name'];
    $target_dir = "../../Photo/Vehicleimg/";
    $target_file = $target_dir . basename($image_path);

    move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file);

    $sql = "INSERT INTO vehicles (vehicle_name, model, seats, fuel_type, transmission, license_plate, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiisss", $vehicle_name, $model, $seats, $fuel_type, $transmission, $license_plate, $image_path);

    $stmt->execute();

    $stmt->close();
    $conn->close();

    // Redirect back to the vehicle management page
    header("Location:../../../admin/vehiclemanagement.php");
    exit();
}
?>
