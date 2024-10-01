<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PrimeRide | About</title>
</head>

<body>
  <!-- Header -->
  <header class="p-3 text-bg-brown header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="../assets/Photo/main/Ride Logo.png" class="navlogo" alt="">
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
                <li class="nav-item"><a href="booking.php" class="nav-link">Bookings</a></li>
                <li class="nav-item"><a href="SelectVehicle.html" class="nav-link"></a>Offers</li>
                <li class="nav-item"><a href="FAQ.html" class="nav-link">FAQ</a></li>
                <li class="nav-item"><a href="Pages/events.html" class="nav-link">Events</a></li>
                
                <li class="nav-item"><a href="Contactus.html" class="nav-link">Contact Us</a></li>
        </ul>
      </header>
    </div>
  </div>
  </header>
<!-- End of small Header -->

  <div class="about">
    <div class="px-4 pt-5 my-5 text-center border-bottom abuthead">
      <h1 class="display-4 fw-bold  abuthead">Prime Ride Car Rental</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
        Welcome to PrimeRide – Your Ultimate Car Rental Solution in Sri Lanka

At PrimeRide, we are redefining the car rental experience by combining convenience, reliability, and exceptional service to meet the diverse needs of modern travelers. Whether you're a local resident, a business professional, or an international visitor, PrimeRide offers a seamless, hassle-free car rental solution tailored to your journey.

Our fleet features a wide range of vehicles, from compact cars perfect for city driving to luxury sedans, spacious SUVs, and off-road vehicles for your Sri Lankan adventures. With flexible rental terms, easy online booking, and transparent pricing, PrimeRide ensures your rental process is smooth and stress-free.

At the core of our operations is a commitment to customer satisfaction, safety, and sustainability. Each vehicle is meticulously maintained and equipped with advanced safety features, while our growing eco-friendly fleet reflects our dedication to promoting sustainable travel.

Choose PrimeRide for your next trip and experience a superior level of service, convenience, and care. Let us make your journey across Sri Lanka memorable, safe, and enjoyable.
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
          <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Gallery</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
        </div>
      </div>
      <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
          <img src="" class="img-fluid border rounded-3 shadow-lg mb-4"
            alt="Example image" width="700" height="500" loading="lazy">
        </div>
      </div>
    </div>
  </div>

<!-- Gallery Section -->
<section id="gallery" class="gallery">
  <div class="container-fluid">
    <div class="section-title">
      <h2>Some Photos from <span>Our Fleet</span></h2>
      <p>Experience PrimeRide's Exceptional Fleet</p>
    </div>

    <div class="row g-0">
      <?php
      include '../assets/php/dbconnection.php';

      $sql = "SELECT image_path FROM gallery_images";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                          <a href="../assets/Photo/' . $row["image_path"] . '" class="gallery-lightbox">
                            <img src="../assets/Photo/' . $row["image_path"] . '" alt="PrimeRide Car" class="img-fluid">
                          </a>
                        </div>
                      </div>';
          }
      } else {
          echo "0 results";
      }

      $conn->close();
      ?>
    </div>
  </div>
</section>
<!-- End Gallery Section -->

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