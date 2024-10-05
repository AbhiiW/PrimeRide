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
  
  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#vehicles">Vehicle Management</a>
    <a href="#bookings">Booking Management</a>
    <a href="#payments">Payment Management</a>
    <a href="#staff">Staff Management</a>
    <a href="#gallery">Gallery Management</a>
    <a href="#messages">Customer Messages</a>
    <a href="#promotions">Promotions</a>
    <a href="#reviews">Customer Reviews</a>
  </div>

  <!-- Content Area -->

   <!-- Vehicle Management -->

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


    <!-- Booking Management -->
    <div id="bookings" class="container-fluid mt-5">
      <h2>Booking Management</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Customer</th>
            <th>Vehicle</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>123</td>
            <td>John Doe</td>
            <td>Toyota Prius</td>
            <td>
              <select class="form-select">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
              </select>
            </td>
            <td><button class="btn btn-success">Update Status</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Payment Management -->
    <div id="payments" class="container-fluid mt-5">
      <h2>Payment Management</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Payment ID</th>
            <th>Customer</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>4321</td>
            <td>Jane Smith</td>
            <td>$500</td>
            <td>
              <select class="form-select">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
              </select>
            </td>
            <td><button class="btn btn-success">Approve</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Staff Management -->
    <div id="staff" class="container-fluid mt-5">
      <h2>Staff Management</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStaffModal">Add Staff Member</button>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>admin</td>
            <td>
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Gallery Management -->
    <div id="gallery" class="container-fluid mt-5">
      <h2>Gallery Management</h2>
      <button class="btn btn-primary">Update Gallery</button>
    </div>

    <!-- Customer Messages -->
    <div id="messages" class="container-fluid mt-5">
      <h2>Customer Messages</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Message ID</th>
            <th>Customer</th>
            <th>Message</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Great service!</td>
            <td><button class="btn btn-secondary">Reply</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Promotions -->
    <div id="promotions" class="container-fluid mt-5">
      <h2>Promotions</h2>
      <button class="btn btn-primary">Add Promotion</button>
    </div>

    <!-- Customer Reviews -->
    <div id="reviews" class="container-fluid mt-5">
      <h2>Customer Reviews</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Review ID</th>
            <th>Customer</th>
            <th>Review</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>10</td>
            <td>Sara</td>
            <td>Loved the ride!</td>
            <td><button class="btn btn-danger">Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modals -->
  <!-- Add Vehicle Modal -->
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
              <label for="licensePlate" class="form-label">License Plate</label>
              <input type="text" class="form-control" id="licensePlate">
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Staff Modal -->
  <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStaffModalLabel">Add New Staff Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Add Staff Member</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
