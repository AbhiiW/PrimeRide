<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental Admin Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
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
 
<?php
include '../../assets/php/dbconnection.php';

// Fetch vehicles
$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-md-4">
          <div class="card car-card mb-4">
            <img src="' . $row["image_path"] . '" class="card-img-top" alt="' . $row["vehicle_name"] . '">
            <div class="card-body">
              <h5 class="card-title">' . $row["vehicle_name"] . '</h5>
              <p class="card-text">' . $row["model"] . ' - ' . $row["seats"] . ' seats, ' . $row["fuel_type"] . ', ' . $row["transmission"] . '</p>
              <ul class="list-unstyled">
                <li><strong>License Plate:</strong> ' . $row["license_plate"] . '</li>
              </ul>
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">Edit</button>
              <form method="POST" action="delete_vehicle.php" style="display:inline;">
                <input type="hidden" name="deleteVehicleId" value="' . $row["id"] . '">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>';
    }
} else {
    echo "No vehicles found.";
}

$conn->close();
?>
  
  <!-- Modal for Adding Vehicle -->
  <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="vehicleName" class="form-label">Vehicle Name</label>
              <input type="text" class="form-control" id="vehicleName">
            </div>
            <div class="mb-3">
              <label for="vehicleModel" class="form-label">Model</label>
              <input type="text" class="form-control" id="vehicleModel">
            </div>
            <div class="mb-3">
              <label for="seats" class="form-label">Seats</label>
              <input type="number" class="form-control" id="seats">
            </div>
            <div class="mb-3">
              <label for="fuelType" class="form-label">Fuel Type</label>
              <input type="text" class="form-control" id="fuelType">
            </div>
            <div class="mb-3">
              <label for="transmission" class="form-label">Transmission</label>
              <input type="text" class="form-control" id="transmission">
            </div>
            <div class="mb-3">
              <label for="licensePlate" class="form-label">License Plate</label>
              <input type="text" class="form-control" id="licensePlate">
            </div>
            <div class="mb-3">
              <label for="vehicleImage" class="form-label">Vehicle Image</label>
              <input type="file" class="form-control" id="vehicleImage" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="mb-3">
              <img id="imagePreview" src="https://via.placeholder.com/300x200" alt="Vehicle Image Preview" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal for Editing Vehicle -->
  <div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editVehicleModalLabel">Edit Vehicle Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="editVehicleName" class="form-label">Vehicle Name</label>
              <input type="text" class="form-control" id="editVehicleName" value="Toyota Camry">
            </div>
            <div class="mb-3">
              <label for="editVehicleModel" class="form-label">Model</label>
              <input type="text" class="form-control" id="editVehicleModel" value="2023">
            </div>
            <div class="mb-3">
              <label for="editSeats" class="form-label">Seats</label>
              <input type="number" class="form-control" id="editSeats" value="5">
            </div>
            <div class="mb-3">
              <label for="editFuelType" class="form-label">Fuel Type</label>
              <input type="text" class="form-control" id="editFuelType" value="Gasoline">
            </div>
            <div class="mb-3">
              <label for="editTransmission" class="form-label">Transmission</label>
              <input type="text" class="form-control" id="editTransmission" value="Automatic">
            </div>
            <div class="mb-3">
              <label for="editLicensePlate" class="form-label">License Plate</label>
              <input type="text" class="form-control" id="editLicensePlate" value="ABC-1234">
            </div>
            <div class="mb-3">
              <label for="editVehicleImage" class="form-label">Vehicle Image</label>
              <input type="file" class="form-control" id="editVehicleImage" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="mb-3">
              <img id="editImagePreview" src="https://via.placeholder.com/300x200" alt="Vehicle Image Preview" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-primary">Update Vehicle</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
  


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
