<?php
// submit_rent.php
include '../dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_name = $_POST['vehicle_name'];
    $plate_number = $_POST['plate_number'];
    $model = $_POST['model'];
    $customer_username = $_POST['customer_username'];
    $customer_email = $_POST['customer_email'];
    $rental_duration = $_POST['rental_duration'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];
    
    
    $rental_status = "Pending"; 
    $created_at = date('Y-m-d H:i:s');

    // Insert into the rental table
    $sql = "INSERT INTO rental (vehicle_name, plate_number, model, customer_username, customer_email, rental_duration, pickup_date, dropoff_date, rental_status, created_at) 
            VALUES ('$vehicle_name', '$plate_number', '$model', '$customer_username', '$customer_email', '$rental_duration', '$pickup_date', '$dropoff_date', '$rental_status', '$created_at')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Rental request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
