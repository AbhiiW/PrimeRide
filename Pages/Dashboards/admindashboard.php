<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PrimeRide | Admin Dashboard </title>
</head>

<body>
  <!-- Header -->
  <header class="p-3 text-bg-brown header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="../../assets/Photo/logonew.png" class="navlogo" alt="">
          </a>
          <h1>PrimeRide Admin Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="adminmain">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard Management</h1>
      </div>

      <div class="container">
        <div class="row">

          <!-- Vehicle Management Section -->
<div class="col-md-6">
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4>Vehicle Management</h4>
    </div>
    <div class="card-body">
      <form action="../../assets/php/Admin_Functions/vehicle_management.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="vehicleName" class="form-label">Vehicle Name</label>
          <input type="text" class="form-control" id="vehicleName" name="vehicleName" required>
        </div>
        <div class="mb-3">
          <label for="vehicleType" class="form-label">Vehicle Type</label>
          <input type="text" class="form-control" id="vehicleType" name="vehicleType" required>
        </div>
        <div class="mb-3">
          <label for="vehiclePrice" class="form-label">Price</label>
          <input type="text" class="form-control" id="vehiclePrice" name="vehiclePrice" required>
        </div>
        <!-- Add Photo Section -->
        <div class="mb-3">
          <label for="vehiclePhoto" class="form-label">Vehicle Photo</label>
          <input type="file" class="form-control" id="vehiclePhoto" name="vehiclePhoto" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Vehicle</button>
      </form>
    </div>
  </div>
</div>

          <!-- Fleet Management Section -->
          <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4>Fleet Management</h4>
              </div>
              <div class="card-body">
                <form action="../../assets/php/Admin_Functions/fleet_management.php" method="post">
                  <div class="mb-3">
                    <label for="fleetName" class="form-label">Fleet Name</label>
                    <input type="text" class="form-control" id="fleetName" name="fleetName" required>
                  </div>
                  <div class="mb-3">
                    <label for="fleetSize" class="form-label">Fleet Size</label>
                    <input type="number" class="form-control" id="fleetSize" name="fleetSize" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Manage Fleet</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Booking Management Section -->
          <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4>Booking Management</h4>
              </div>
              <div class="card-body">
                <form action="../../assets/php/Admin_Functions/booking_management.php" method="post">
                  <div class="mb-3">
                    <label for="bookingID" class="form-label">Booking ID</label>
                    <input type="text" class="form-control" id="bookingID" name="bookingID" required>
                  </div>
                  <div class="mb-3">
                    <label for="customerName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customerName" name="customerName" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Manage Booking</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Reporting and Analytics Section -->
          <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4>Reporting and Analytics</h4>
              </div>
              <div class="card-body">
                <form action="../../assets/php/Admin_Functions/reporting_analytics.php" method="post">
                  <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <input type="text" class="form-control" id="reportType" name="reportType" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Generate Report</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>

  <!-- View Bookings Section -->
<div class="col-md-12">
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4>View Bookings</h4>
    </div>
    <div class="card-body">
      <?php
      
      include '../../assets/php/Database/db_connection.php';
      
      
      $sql = "SELECT booking_id, vehicle_name, customer_name, booking_date, status FROM bookings";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Booking ID</th><th>Vehicle Name</th><th>Customer Name</th><th>Booking Date</th><th>Status</th></tr></thead>';
        echo '<tbody>';
        
        
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["booking_id"] . '</td>';
          echo '<td>' . $row["vehicle_name"] . '</td>';
          echo '<td>' . $row["customer_name"] . '</td>';
          echo '<td>' . $row["booking_date"] . '</td>';
          echo '<td>' . $row["status"] . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>No bookings found.</p>';
      }

      
      $conn->close();
      ?>
    </div>
  </div>
</div>


  <!-- Footer -->
  <footer id="footer" class="footer dark-background">
    <div class="container">
      <div class="row gy-3">
        <!-- Footer details -->
      </div>
    </div>
    <hr class="featurette-divider">
    <div class="container text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PrimeRide</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href=""></a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
