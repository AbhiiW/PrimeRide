<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> The Gallery Cafe | Staff Dashboard </title>
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
                <h1>The Gallery Cafe Staff Dashboard</h1>
            </div>               
        </div>
    </div>
</header>
  
      
     <!-- Dashboard -->
  <div class="container my-5">
    <h1 class="text-center">Staff Dashboard</h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Reservation Date</th>
            <th>Reservation Time</th>
          </tr>
        </thead>
        <tbody>
         
          <?php
          include '../../assets/php/dbconnection.php';
          $sql = "SELECT customer_name, customer_email, reservation_date, reservation_time FROM reservations";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["customer_name"]. "</td><td>" . $row["customer_email"]. "</td><td>" . $row["reservation_date"]. "</td><td>" . $row["reservation_time"]. "</td></tr>";
              }
          } else {
              echo "<tr><td colspan='4' class='text-center'>No reservations found</td></tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>


   <!-- Footer -->
   <footer id="footer" class="footer dark-background">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex align-items-start">
          <i class="bi bi-geo-alt icon me-3"></i>
          <div class="address">
            <h4>Address</h4>
            <p>St Peters Street<br>Colombo 04</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-start">
          <i class="bi bi-telephone icon me-3"></i>
          <div>
            <h4>Contact</h4>
            <p><strong>Phone:</strong> <span>+94112587968</span><br>
               <strong>Email:</strong> <span>thegallerycafe@gmail.com</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-start">
          <i class="bi bi-clock icon me-3"></i>
          <div>
            <h4>Opening Hours</h4>
            <p><strong>Mon-Sat:</strong> <span>09.00 AM - 11.00 PM</span><br>
               <strong>Sunday:</strong> <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter me-2"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook me-2"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram me-2"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin me-2"></i></a>
          </div>
        </div>
      </div>
    </div>
    <hr class="featurette-divider">
    <div class="container text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">The Gallery Cafe</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="">Abhiman Wijesekara</a>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
