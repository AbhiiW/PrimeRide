<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Gallery Cafe | Booking</title>
</head>

<body>

  <!-- Header -->
  <header class="p-3 text-bg-brown header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="../assets/Photo/logonew.png" class="navlogo" alt="">
          </a>
          <h1>The Gallery Cafe</h1>
        </div>
        <div class="d-flex align-items-center ms-auto">
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" id="search" role="search">
            <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
              aria-label="Search">
          </form>

        </div>
      </div>
    </div>
  </header>
  <hr class="featurette-divider">
  <div class="submenudirect-wrapper">
    <div class="container submenudirect">
      <header class="d-flex justify-content-py-5">
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="../Index2.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="Menu.html" class="nav-link">Menu</a></li>
          <li class="nav-item"><a href="events.html" class="nav-link">Events</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
        </ul>
      </header>
    </div>
  </div>

  <!-- Hero Section -->

<!-- Reservation Form -->
<div class="bookingForm">

<?php
session_start();

if (isset($_SESSION['message'])) {
    $messageType = $_SESSION['message_type'] === 'success' ? 'alert-success' : 'alert-danger';
    echo '<div class="alert ' . $messageType . '">' . $_SESSION['message'] . '</div>';

    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>
  <div id="reservationForm" class="container mt-5">
    <h2>Make a Reservation</h2>
    <form action="../assets/php/submit-reservation.php" method="POST">
      <div class="mb-3">
        <label for="customerName" class="form-label">Name</label>
        <input type="text" class="form-control" id="customerName" name="customerName" required>
      </div>
      <div class="mb-3">
        <label for="customerEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
      </div>
      <div class="mb-3">
        <label for="reservationDate" class="form-label">Date</label>
        <input type="date" class="form-control" id="reservationDate" name="reservationDate" required>
      </div>
      <div class="mb-3">
        <label for="reservationTime" class="form-label">Time</label>
        <input type="time" class="form-control" id="reservationTime" name="reservationTime" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit Reservation</button>
    </form>
  </div>
</div>



        </div>

      </div>

    </section>

  </div>
  <br>


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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">The Gallery Cafe</strong> <span>All Rights
          Reserved</span></p>
      <div class="credits">
        Designed by <a href="">Abhiman Wijesekara</a>
      </div>
    </div>
  </footer>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>



















































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>