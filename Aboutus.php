<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PrimeRide | About Us</title>
  </head>

  <body>
    <!-- Header -->
    <header class="p-3 text-bg-brown header">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <a
              href=""
              class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
            >
              <img
                src="assets/Photo/main/Ride logo.png"
                class="navlogo"
                alt=""
              />
            </a>
            <h1>Prime Ride Car Rental</h1>
          </div>
          <div class="d-flex align-items-center ms-auto">
            <form
              class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"
              id="search"
              role="search"
            >
              <input
                type="search"
                class="form-control form-control-dark text-bg-dark"
                placeholder="Search..."
                aria-label="Search"
              />
            </form>
          </div>
        </div>
      </div>
    </header>
    <hr class="featurette-divider" />
    <div class="submenudirect-wrapper">
      <div class="container submenudirect">
        <header class="d-flex justify-content-py-5">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a href="Index2.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="SelectVehicle.html" class="nav-link">Select A Vehicle</a>
            </li>
            <li class="nav-item">
              <a href="../specialoffers.html" class="nav-link">Offers</a>
            </li>
            <li class="nav-item">
              <a href="Pages/booking.php" class="nav-link">Bookings</a>
            </li>
            <li class="nav-item">
              <a href="FAQ.html" class="nav-link">FAQ</a>
            </li>
            <li class="nav-item">
              <a href="Pages/about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="Contactus.html" class="nav-link">Contact Us</a>
            </li>
          </ul>
        </header>
      </div>
    </div>

    <!-- About Us Section -->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img
              src="assets/Photo/main/car.jpg"
              alt="PrimeRide Fleet"
              class="img-fluid rounded"
            />
          </div>
          <div class="col-md-6">
            <h2 class="display-6">About PrimeRide</h2>
            <p class="lead">
              Welcome to PrimeRide, the leading car rental solution in Sri
              Lanka. Whether you're exploring the city, planning a road trip, or
              on a business visit, we provide a fleet of vehicles that suits
              your every need. From compact cars to luxury sedans, spacious
              SUVs, and rugged off-road vehicles, PrimeRide has got you covered.
            </p>
            <p>
              Our mission is to offer a car rental experience that exceeds
              customer expectations by focusing on convenience, reliability, and
              personalized service. With a state-of-the-art online booking
              system, you can effortlessly browse our fleet, compare options,
              and secure your rental in minutes. No hidden fees—just transparent
              pricing and an enjoyable journey ahead.
            </p>
            <p>
              At PrimeRide, we prioritize safety and sustainability. Every
              vehicle in our fleet undergoes strict maintenance, ensuring the
              highest safety standards. We're also proud to introduce
              eco-friendly hybrid and electric options for environmentally
              conscious travelers.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Mission, Vision, and Values -->
    <section class="py-5 text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <i class="bi bi-compass display-4 text-primary"></i>
            <h3 class="mt-3">Our Mission</h3>
            <p>
              To provide a superior car rental experience that combines
              convenience, safety, and sustainability, while meeting the
              evolving needs of our customers.
            </p>
          </div>
          <div class="col-md-4">
            <i class="bi bi-lightbulb display-4 text-primary"></i>
            <h3 class="mt-3">Our Vision</h3>
            <p>
              To be the most trusted and preferred car rental service in Sri
              Lanka, offering innovative and flexible travel solutions that
              ensure memorable journeys.
            </p>
          </div>
          <div class="col-md-4">
            <i class="bi bi-heart display-4 text-primary"></i>
            <h3 class="mt-3">Our Values</h3>
            <p>
              Customer satisfaction, transparency, and commitment to
              sustainability are at the heart of everything we do. We strive to
              provide exceptional service with every rental.
            </p>
          </div>
        </div>
      </div>
    </section>
<!-- Gallery Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-6 mb-4">Gallery</h2>
    <div class="row">

      <?php
      // Include the database connection file
      include 'assets/php/dbconnection.php';
      
      // Query to fetch gallery items from the database
      $sql = "SELECT title, image_path FROM gallery";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Loop through each gallery item and display the card
          while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img src="assets/Photo/galleryimg/<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>"/>
                  </div>
              </div>
              <?php
          }
      } else {
          echo "No gallery items available.";
      }
      
      $conn->close();
      ?>
      

    </div>
  </div>
</section>


    <!-- Footer -->
    <footer id="footer" class="footer dark-background">
      <div class="container">
        <div class="row gy-3">
          <div class="col-lg-3 col-md-6 d-flex align-items-start">
            <i class="bi bi-geo-alt icon me-3"></i>
            <div class="address">
              <h4>Address</h4>
              <p>Kurunegala Road<br />Katugasthota, Kandy</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-start">
            <i class="bi bi-telephone icon me-3"></i>
            <div>
              <h4>Contact</h4>
              <p>
                <strong>Phone:</strong> <span>(077) 766 3798</span><br />
                <strong>Email:</strong> <span>primeride@gmail.com</span>
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-start">
            <i class="bi bi-clock icon me-3"></i>
            <div>
              <h4>Working Hours</h4>
              <p>Mon-Sat: 8 AM - 6 PM<br />Sun: Closed</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-start">
            <i class="bi bi-linkedin icon me-3"></i>
            <div>
              <h4>Follow Us</h4>
              <a href="#" class="me-3">Facebook</a>
              <a href="#" class="me-3">Twitter</a>
              <a href="#" class="me-3">Instagram</a>
              <a href="#" class="me-3">LinkedIn</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-LCIVT7xg1NsX9vvPe6W+ReW5xSN7F0z93qN2WTFc/qWhE0fAwTR9CrK2nH/htVTe" crossorigin="anonymous"></script>
  </body>
</html>
