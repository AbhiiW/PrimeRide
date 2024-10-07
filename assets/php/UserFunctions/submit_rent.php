<?php
include '../dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_name = $_POST['vehicle_name'];
    $plate_number = $_POST['plate_number'];
    $model = $_POST['model'];
    $customer_username = $_POST['customer_username'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $rental_duration = $_POST['rental_duration'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];
    $total_price = $_POST['total_price']; 
    
    $rental_status = "Pending Payment"; 
    $created_at = date('Y-m-d H:i:s');
    $rental_id = rand(100000, 999999); 

    
    $sql_check = "SELECT * FROM rental 
                  WHERE plate_number = ? 
                  AND (rental_status = 'Pending Payment' OR rental_status = 'Approved')
                  AND (
                        (pickup_date BETWEEN ? AND ?) OR
                        (dropoff_date BETWEEN ? AND ?) OR
                        (? BETWEEN pickup_date AND dropoff_date) OR
                        (? BETWEEN pickup_date AND dropoff_date)
                      )";

    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("sssssss", $plate_number, $pickup_date, $dropoff_date, $pickup_date, $dropoff_date, $pickup_date, $dropoff_date);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        
        echo "<script>
                alert('System Alert : The vehicle is not available during the selected dates.');
                window.location.href = '../../../rent-car.php'; // Redirect back to the rent page
              </script>";
    } else {
        
        $sql = "INSERT INTO rental (rental_id, vehicle_name, plate_number, model, customer_name, customer_username, customer_email, rental_duration, pickup_date, dropoff_date, total_price, rental_status, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssssssss", $rental_id, $vehicle_name, $plate_number, $model, $customer_name, $customer_username, $customer_email, $rental_duration, $pickup_date, $dropoff_date, $total_price, $rental_status, $created_at);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Rental request submitted successfully!');
                    window.location.href = '../../../profile.php'; // Redirect to the profile page or any desired page
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not submit the rental request. Please try again later.');
                    window.location.href = '../../../rent-car.php'; // Redirect back to the rent page or desired page
                  </script>";
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>
