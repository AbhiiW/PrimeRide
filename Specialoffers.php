<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime - Ride | Special Offers</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Header -->
<header class="p-3 text-bg-brown header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="assets/Photo/main/Ride logo.png" class="navlogo" alt=""> 
            <!-- Logo -->
          </a>
          <h1>Prime Ride Car Rental</h1>
        </div>
        <div class="d-flex align-items-center ms-auto">
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" id="search" role="search">
            <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
              aria-label="Search">
          </form>
          <div class="text-end">
            <a href="pages/login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
            <a href="pages/signup.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
          </div>
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
          <li class="nav-item"><a href="Pages/booking.php" class="nav-link">Bookings</a></li>          
          <li class="nav-item"><a href="FAQ.html" class="nav-link">FAQ</a></li>
          <li class="nav-item"><a href="events.html" class="nav-link">Events</a></li>
          <li class="nav-item"><a href="Contactus.html" class="nav-link">Contact Us</a></li>
          <li class="nav-item"><a href="Pages/about.php" class="nav-link">About Us</a></li>

        </ul>
      </header>
    </div>
  </div>

 <!-- Image Drawer Section for Prime Ride Car Rental -->
<hr class="featurette-divider">
<div class="drawer container drawersize"></div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="SUV">
            <div class="carousel-caption d-none d-md-block">
                <h5>SUV Rentals</h5>
                <p>Spacious and comfortable SUVs, perfect for long road trips with family or friends.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="Sedan">
            <div class="carousel-caption d-none d-md-block">
                <h5>Sedan Rentals</h5>
                <p>Sleek and smooth sedans for business trips or comfortable city travel.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="Luxury Cars">
            <div class="carousel-caption d-none d-md-block">
                <h5>Luxury Cars</h5>
                <p>Experience premium luxury for special occasions or high-end travel needs.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/Photo/main/1414.png.png" class="d-block w-100" alt="Hatchback">
            <div class="carousel-caption d-none d-md-block">
                <h5>Hatchback Rentals</h5>
                <p>Compact and fuel-efficient hatchbacks, ideal for navigating the city streets.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="Van">
            <div class="carousel-caption d-none d-md-block">
                <h5>Van Rentals</h5>
                <p>Spacious vans for large groups or transporting goods with ample space.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- Special Offers Section Starts -->
<section class="special-offers py-5" id="special-offers">
    <div class="container">
        <h1 class="text-center mb-5"> <span>Special Offers</span> </h1>
        <div class="row">
          <?php
          // Include the database connection file
          include 'assets/php/dbconnection.php';
          
          // Query to fetch promotions from the database
          $sql = "SELECT title, description, price, original_price, image_path FROM offers";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              // Loop through each promotion and display the card
              while ($row = $result->fetch_assoc()) {
                  ?>
                  <!-- Offer Card -->
                  <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card h-100">
                          <img src="assets/Photo/Offerimg/<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                          <div class="card-body text-center">
                              <h3 class="card-title"><?php echo $row['title']; ?></h3>
                              <p class="card-text"><?php echo $row['description']; ?></p>
                              <h4 class="text-success">$<?php echo number_format($row['price'], 2); ?> <span class="text-muted"><del>$<?php echo number_format($row['original_price'], 2); ?></del></span></h4>
                              <a href="#" class="btn btn-primary mt-3">Order Now</a>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          } else {
              echo "No promotions available.";
          }
          
          $conn->close();
          ?>
          
<!-- Special Offers Section Ends -->

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

  <script src="assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
