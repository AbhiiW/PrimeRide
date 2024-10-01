<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PrimeRide | Booking</title>
</head>

<body>

  <!-- Header -->
  <header class="p-3 text-bg-dark header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="../assets/Photo/logo.png" class="navlogo" alt="">
          </a>
          <h1>PrimeRide Car Rentals</h1>
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
                <li class="nav-item"><a href="Index2.html" class="nav-link">Home</a></li>                             
                <li class="nav-item"><a href="SelectVehicle.html" class="nav-link"></a>Offers</li>
                <li class="nav-item"><a href="FAQ.html" class="nav-link">FAQ</a></li>
                <li class="nav-item"><a href="Pages/events.html" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="Contactus.html" class="nav-link">Contact Us</a></li>
        </ul>
      </header>
    </div>
  </div>

  <!-- Booking Form -->
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
      <h2>Car Rental Booking</h2>
      <form action="../assets/php/submit-booking.php" method="POST">
        <div class="mb-3">
          <label for="customerName" class="form-label">Name</label>
          <input type="text" class="form-control" id="customerName" name="customerName" required>
        </div>
        <div class="mb-3">
          <label for="customerEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
        </div>
        <div class="mb-3">
          <label for="pickupLocation" class="form-label">Pick-up Location</label>
          <input type="text" class="form-control" id="pickupLocation" name="pickupLocation" required>
        </div>
        <div class="mb-3">
          <label for="dropoffLocation" class="form-label">Drop-off Location</label>
          <input type="text" class="form-control" id="dropoffLocation" name="dropoffLocation" required>
        </div>
        <div class="mb-3">
          <label for="pickupDate" class="form-label">Pick-up Date</label>
          <input type="date" class="form-control" id="pickupDate" name="pickupDate" required>
        </div>
        <div class="mb-3">
          <label for="dropoffDate" class="form-label">Drop-off Date</label>
          <input type="date" class="form-control" id="dropoffDate" name="dropoffDate" required>
        </div>
        <div class="mb-3">
          <label for="vehicleType" class="form-label">Vehicle Type</label>
          <select class="form-select" id="vehicleType" name="vehicleType" required>
            <option value="" selected disabled>Select a vehicle</option>
            <option value="Sedan">Sedan</option>
            <option value="SUV">SUV</option>
            <option value="Van">Van</option>
            <option value="Truck">Truck</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="additionalRequests" class="form-label">Additional Requests</label>
          <textarea class="form-control" id="additionalRequests" name="additionalRequests" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Booking</button>
      </form>
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
          <p>Kurunegala Road<br>Katugasthota, Kandy</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-start">
        <i class="bi bi-telephone icon me-3"></i>
        <div>
          <h4>Contact</h4>
          <p><strong>Phone:</strong> <span>(077) 766 3798</span><br>
            <strong>Email:</strong> <span>primeride@gmail.com</span>
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
