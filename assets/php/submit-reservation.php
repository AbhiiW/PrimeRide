<?php
session_start();
include 'dbconnection.php';

$customerName = $_POST['customerName'];
$customerEmail = $_POST['customerEmail'];
$reservationDate = $_POST['reservationDate'];
$reservationTime = $_POST['reservationTime'];

$sql = "INSERT INTO reservations (customer_name, customer_email, reservation_date, reservation_time)
        VALUES ('$customerName', '$customerEmail', '$reservationDate', '$reservationTime')";

if ($conn->query($sql) === true) {
    $_SESSION['message'] = 'Reservation successfully made!';
    $_SESSION['message_type'] = 'success';
} else {
    $_SESSION['message'] = 'Error: ' . $conn->error;
    $_SESSION['message_type'] = 'error';
}

$conn->close();

header('Location: ../../Pages/booking.php');
exit();
