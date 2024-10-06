<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin-top:100px;
    }
    .sidebar {
      width: 250px;
      position: fixed;
      height: 100%;
      background-color: #343a40;
      color: #fff;
      padding-top: 20px;
    }
    .sidebar a {
      padding: 15px;
      text-decoration: none;
      color: #fff;
      display: block;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
</head>
<body>

  <header class="p-3 text-bg-brown header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="assets/Photo/main/Ride logo.png" class="navlogo" alt="">
                </a>
                <h1>Prime Ride Admin Dashboard</h1>
            </div>
            <div class="d-flex align-items-center ms-auto">                           
            </div>
        </div>
    </div>
</header>
  
  <!-- Sidebar -->
  <div class="sidebar">
    <a href="vehiclemanagement.html">Vehicle Management</a>
    <a href="bookingmanagement.html">Booking Management</a>
    <a href="staffmanagement.html">Staff Management</a>
    <a href="gallerymanagement.html">Gallery Management</a>
    <a href="customermessages.html">Customer Messages</a>
    <a href="promotions.html">Promotions</a>
    <a href="customer-reviews.html">Customer Reviews</a>
  </div>

  <!-- Main Content Area -->
<!-- Bookings -->
<?php
include '../assets/php/dbconnection.php'; 
?>
<div class="content">
    <h2>Booking Management</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Rental ID</th>
          <th>Customer</th>
          <th>Vehicle</th>
          <th>Plate Number</th>
          <th>Model</th>
          <th>Duration (days)</th>
          <th>Pickup Date</th>
          <th>Dropoff Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Fetch rental data
        $sql = "SELECT rental_id, customer_username, vehicle_name, plate_number, model, rental_duration, 
                pickup_date, dropoff_date, rental_status, receipt_url FROM rental"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each row
            while($row = $result->fetch_assoc()) {
                // Construct the receipt URL
                $receiptUrl = "../assets/Photo/paymentreciepts/{$row['receipt_url']}";
                
                echo "<tr>
                        <td>{$row['rental_id']}</td>
                        <td>{$row['customer_username']}</td>
                        <td>{$row['vehicle_name']}</td>
                        <td>{$row['plate_number']}</td>
                        <td>{$row['model']}</td>
                        <td>{$row['rental_duration']}</td>
                        <td>{$row['pickup_date']}</td>
                        <td>{$row['dropoff_date']}</td>
                        <td>
                            <form method='post' action='../assets/php/AdminFunctions/ViewRentals.php'>
                                <input type='hidden' name='rental_id' value='{$row['rental_id']}'>
                                <select class='form-select' name='rental_status'>
                                    <option value='Available' " . ($row['rental_status'] == 'Available' ? 'selected' : '') . ">Available</option>
                                    <option value='Out' " . ($row['rental_status'] == 'Out' ? 'selected' : '') . ">Out</option>
                                    <option value='Payment pending' " . ($row['rental_status'] == 'Payment pending' ? 'selected' : '') . ">Payment pending</option>
                                    <option value='Processing' " . ($row['rental_status'] == 'Processing' ? 'selected' : '') . ">Processing</option>
                                    <option value='In service' " . ($row['rental_status'] == 'In service' ? 'selected' : '') . ">In service</option>
                                </select>
                        </td>
                        <td>
                            <button class='btn btn-success' type='submit'>Update Status</button>
                            </form>
                        </td>
                        <td>
                            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#receiptModal' onclick='showReceipt(\"$receiptUrl\")'>View Receipt</button>
                            <form method='post' action='../assets/php/AdminFunctions/DeleteRental.php' style='display:inline;'>
                                <input type='hidden' name='rental_id' value='{$row['rental_id']}'>
                                <button class='btn btn-danger' type='submit' onclick='return confirm(\"Are you sure you want to delete this booking?\");'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No bookings found</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
</div>


<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Payment Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="receiptContent">
                <p id="receiptMessage">Loading receipt...</p>
            </div>
        </div>
    </div>
</div>

<script>
function showReceipt(receiptUrl) {
    var receiptContent = document.getElementById("receiptContent");
    var receiptMessage = document.getElementById("receiptMessage");

    if (receiptUrl) {
        // If URL exists, display it
        receiptContent.innerHTML = "<iframe src='" + receiptUrl + "' style='width: 100%; height: 500px;' frameborder='0'></iframe>";
    } else {
        // If no URL, show an error message
        receiptContent.innerHTML = "";
        receiptMessage.innerHTML = "Error: Receipt does not exist.";
    }
}
</script>


  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
