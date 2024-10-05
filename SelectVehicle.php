<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prime Ride | Menu</title>
</head>
<body>


   <!-- Header -->
   <header class="p-3 text-bg-brown header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="assets/Photo/main/Ride logo.png" class="navlogo" alt="">
                </a>
                <h1>PrimeRide</h1>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" id="search" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
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
                <li class="nav-item"><a href="Pages/booking.php" class="nav-link">Bookings</a></li>
                <li class="nav-item"><a href="../specialoffers.html" class="nav-link">Offers</a></li>
                <li class="nav-item"><a href="FAQ.html" class="nav-link">FAQ</a></li>
                <li class="nav-item"><a href="events.html" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="Contactus.html" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="Pages/about.php" class="nav-link">About Us</a></li>
                
                
            </ul>
        </header>
    </div>
</div>
  
   <!-- Hero Section -->
 
   <div class="drawer container drawersize"></div>
   <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="">
       </div>
       <div class="carousel-item">
         <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="">
       </div>
       <div class="carousel-item">
         <img src="assets/Photo/main/1414.png" class="d-block w-100" alt="">
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
 </div>
 
 <style>
  .car-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }
  .car-card {
    transition: box-shadow 0.3s ease;
  }
  .car-card:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }
</style>
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Available Cars</h2>
  <div class="row">

  <?php
include 'assets/php/dbconnection.php';

// Query to fetch vehicles from the database
$sql = "SELECT vehicle_name, model, seats, fuel_type, transmission, image_path FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each vehicle and display the card
    while ($row = $result->fetch_assoc()) {
        ?>
        <!-- Car Card -->
        <div class="col-md-4">
            <div class="card car-card mb-4">
                <img src="assets/Photo/Vehicleimg/<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['vehicle_name']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['vehicle_name']; ?></h5>
                    <p class="card-text"><?php echo $row['model']; ?> - Spacious and comfortable. Perfect for family trips.</p>
                    <ul class="list-unstyled">
                        <li><strong>Seats:</strong> <?php echo $row['seats']; ?></li>
                        <li><strong>Fuel Type:</strong> <?php echo $row['fuel_type']; ?></li>
                        <li><strong>Transmission:</strong> <?php echo $row['transmission']; ?></li>
                    </ul>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rentModal" 
                    onclick="setModalData('<?php echo $row['vehicle_name']; ?>', '<?php echo $row['model']; ?>')">Rent Now</a>

                </div>
            </div>
        </div>
<script>
function setModalData(vehicleName, model) {
    document.getElementById('modalVehicleName').value = vehicleName;
    document.getElementById('modalModel').value = model;
}
</script>

       <!-- Modal -->
<div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="rentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentModalLabel">Rent Vehicle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="assets/php/userFunctions/submit_rent.php" method="POST">
          <input type="hidden" name="vehicle_name" id="modalVehicleName">
          <input type="hidden" name="model" id="modalModel">
          <div class="mb-3">
            <label for="customer_name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="customer_name" required>
          </div>
          <div class="mb-3">
            <label for="customer_email" class="form-label">Your Email</label>
            <input type="email" class="form-control" name="customer_email" required>
          </div>
          <div class="mb-3">
            <label for="rental_duration" class="form-label">Rental Duration (days)</label>
            <input type="number" class="form-control" name="rental_duration" required>
          </div>
          <div class="mb-3">
            <label for="pickup_date" class="form-label">Pickup Date</label>
            <input type="date" class="form-control" name="pickup_date" required>
          </div>
          <div class="mb-3">
            <label for="dropoff_date" class="form-label">Drop-off Date</label>
            <input type="date" class="form-control" name="dropoff_date" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Rent Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
        <?php
    }
} else {
    echo "No vehicles available.";
}

$conn->close();
?>

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
   <script src="assets/js/blockinspect.js"></script>
   <!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </body>
 </html>
 
