<?php
// Include the database connection file
include '../dbconnection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $vehicle_name = $_POST['vehicle_name'];
    $model = $_POST['model'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $rental_duration = $_POST['rental_duration'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];

    // Prepare the SQL statement
    $sql = "INSERT INTO rentals (vehicle_name, model, customer_name, customer_email, rental_duration, pickup_date, dropoff_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $vehicle_name, $model, $customer_name, $customer_email, $rental_duration, $pickup_date, $dropoff_date);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Rent request submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
