<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PrimeRide | Staff Dashboard</title>
</head>
<body>
  <!-- Header -->
  <header class="p-3 text-bg-dark header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="../../assets/Photo/primelogo.png" class="navlogo" alt="PrimeRide Logo">
                </a>
                <h1>PrimeRide Staff Dashboard</h1>
            </div>               
        </div>
    </div>
  </header>

  <!-- Dashboard -->
  <div class="container my-5">
    <h1 class="text-center">Staff Dashboard</h1>
    <div class="row">
      <!-- Login Section -->
      <div class="col-md-6 mb-4">
        <h2>Login</h2>
        <form action="../../assets/php/staff_login.php" method="post">
          <div class="mb-3">
            <label for="staffEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="staffEmail" name="staffEmail" required>
          </div>
          <div class="mb-3">
            <label for="staffPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="staffPassword" name="staffPassword" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>

      <!-- Vehicle Check-In/Check-Out -->
      <div class="col-md-6 mb-4">
        <h2>Vehicle Check-In/Check-Out</h2>
        <form action="../../assets/php/vehicle_checkin_checkout.php" method="post">
          <div class="mb-3">
            <label for="vehicleID" class="form-label">Vehicle ID</label>
            <input type="text" class="form-control" id="vehicleID" name="vehicleID" required>
          </div>
          <div class="mb-3">
            <label for="checkInOut" class="form-label">Check-In or Check-Out</label>
            <select class="form-select" id="checkInOut" name="checkInOut" required>
              <option value="Check-In">Check-In</option>
              <option value="Check-Out">Check-Out</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <!-- Maintenance Scheduling -->
      <div class="col-md-6 mb-4">
        <h2>Maintenance Scheduling</h2>
        <form action="../../assets/php/schedule_maintenance.php" method="post">
          <div class="mb-3">
            <label for="vehicleIDMaintenance" class="form-label">Vehicle ID</label>
            <input type="text" class="form-control" id="vehicleIDMaintenance" name="vehicleIDMaintenance" required>
          </div>
          <div class="mb-3">
            <label for="maintenanceDate" class="form-label">Scheduled Date</label>
            <input type="date" class="form-control" id="maintenanceDate" name="maintenanceDate" required>
          </div>
          <button type="submit" class="btn btn-primary">Schedule</button>
        </form>
      </div>

      <!-- Booking Management -->
      <div class="col-md-6 mb-4">
        <h2>Booking Management</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Booking ID</th>
              <th>Client Name</th>
              <th>Vehicle ID</th>
              <th>Booking Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../../assets/php/dbconnection.php';
            $sql = "SELECT booking_id, client_name, vehicle_id, booking_date, status FROM bookings";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["booking_id"]. "</td><td>" . $row["client_name"]. "</td><td>" . $row["vehicle_id"]. "</td><td>" . $row["booking_date"]. "</td><td>" . $row["status"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No bookings found</td></tr>";
            }
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>

      <!-- Notification System -->
      <div class="col-md-6 mb-4">
        <h2>Notification System</h2>
        <p>Notify staff of pending tasks and updates via email or SMS.</p>
        <form action="../../assets/php/notify.php" method="post">
          <div class="mb-3">
            <label for="notificationMessage" class="form-label">Message</label>
            <textarea class="form-control" id="notificationMessage" name="notificationMessage" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Notification</button>
        </form>
      </div>

      <!-- Contact Client -->
      <div class="col-md-6 mb-4">
        <h2>Contact Client</h2>
        <form action="../../assets/php/contact_client.php" method="post">
          <div class="mb-3">
            <label for="clientEmail" class="form-label">Client Email</label>
            <input type="email" class="form-control" id="clientEmail" name="clientEmail" required>
          </div>
          <div class="mb-3">
            <label for="messageToClient" class="form-label">Message</label>
            <textarea class="form-control" id="messageToClient" name="messageToClient" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
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
