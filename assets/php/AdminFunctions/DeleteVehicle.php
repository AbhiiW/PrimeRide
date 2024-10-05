<?php
include 'dbconnection.php';

if (isset($_POST['deleteVehicleId'])) {
    $id = $_POST['deleteVehicleId'];

    // Delete the vehicle from the database
    $sql = "DELETE FROM vehicles WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Vehicle deleted successfully";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    $conn->close();
    header("Location: ../../../../Pages/Dashboards/admindashboard.php");
}
?>
