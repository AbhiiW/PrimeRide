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
      margin-top: 100px;
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

  <?php
// Include database connection
include '../assets/php/dbconnection.php';
?>

<div class="content">
    <h2>Vehicle Management</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVehicleModal">Add New Vehicle</button>
    <div class="row mt-4">
        <?php
        // Fetch vehicles from the database
        $sql = "SELECT id, vehicle_name, model, seats, fuel_type, transmission, license_plate, image_path FROM vehicles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card car-card">
                        <img src="../assets/Photo/Vehicleimg/<?php echo $row['image_path']; ?>" class="card-img-top"
                             alt="<?php echo $row['vehicle_name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['vehicle_name']; ?></h5>
                            <p class="card-text"><?php echo $row['model']; ?> - Spacious and comfortable. Perfect for family trips.</p>
                            <ul class="list-unstyled">
                                <li><strong>Seats:</strong> <?php echo $row['seats']; ?></li>
                                <li><strong>Fuel Type:</strong> <?php echo $row['fuel_type']; ?></li>
                                <li><strong>Transmission:</strong> <?php echo $row['transmission']; ?></li>
                                <li><strong>License Plate:</strong> <?php echo $row['license_plate']; ?></li>
                            </ul>
                            <form action="../assets/php/AdminFunctions/DeleteVehicle.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateVehicleModal" 
                                    onclick="populateUpdateModal(<?php echo htmlspecialchars(json_encode($row)); ?>)">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No vehicles available.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<!-- Add Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../assets/php/AdminFunctions/AddVehicle.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="vehicleName" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="vehicleName" name="vehicle_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <div class="mb-3">
                        <label for="seats" class="form-label">Seats</label>
                        <input type="number" class="form-control" id="seats" name="seats" required>
                    </div>
                    <div class="mb-3">
                        <label for="fuelType" class="form-label">Fuel Type</label>
                        <input type="text" class="form-control" id="fuelType" name="fuel_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="transmission" class="form-label">Transmission</label>
                        <input type="text" class="form-control" id="transmission" name="transmission" required>
                    </div>
                    <div class="mb-3">
                        <label for="licensePlate" class="form-label">License Plate</label>
                        <input type="text" class="form-control" id="licensePlate" name="license_plate" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagePath" class="form-label">Vehicle Image</label>
                        <input type="file" class="form-control" id="imagePath" name="image_path" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Vehicle Modal -->
<div class="modal fade" id="updateVehicleModal" tabindex="-1" aria-labelledby="updateVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateVehicleModalLabel">Update Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateVehicleForm" method="POST" action="../assets/php/AdminFunctions/UpdateVehicle.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="update_vehicle_id" value="">
                    <div class="mb-3">
                        <label for="update_vehicle_name" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="update_vehicle_name" name="vehicle_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="update_model" name="model" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_seats" class="form-label">Seats</label>
                        <input type="number" class="form-control" id="update_seats" name="seats" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_fuel_type" class="form-label">Fuel Type</label>
                        <input type="text" class="form-control" id="update_fuel_type" name="fuel_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_transmission" class="form-label">Transmission</label>
                        <input type="text" class="form-control" id="update_transmission" name="transmission" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_license_plate" class="form-label">License Plate</label>
                        <input type="text" class="form-control" id="update_license_plate" name="license_plate" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_image_path" class="form-label">Vehicle Image</label>
                        <input type="file" class="form-control" id="update_image_path" name="image_path" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to Populate Update Modal -->
<script>
    function populateUpdateModal(vehicle) {
        document.getElementById('update_vehicle_id').value = vehicle.id;
        document.getElementById('update_vehicle_name').value = vehicle.vehicle_name;
        document.getElementById('update_model').value = vehicle.model;
        document.getElementById('update_seats').value = vehicle.seats;
        document.getElementById('update_fuel_type').value = vehicle.fuel_type;
        document.getElementById('update_transmission').value = vehicle.transmission;
        document.getElementById('update_license_plate').value = vehicle.license_plate;
    }
</script>

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
