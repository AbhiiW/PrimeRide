<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Gallery Cafe | Admin Dashboard </title>
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
          <h1>The Gallery Cafe Admin Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="adminmain">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      
      <div class="container">
        <div class="row">

          <!-- Create Staff User Form -->
          <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4>Create Staff Login</h4>
              </div>
              <div class="card-body">
                <?php
                session_start();
                if (isset($_SESSION['success_message'])) {
                  echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                  unset($_SESSION['success_message']);
                }
                if (isset($_SESSION['error_message'])) {
                  echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                  unset($_SESSION['error_message']);
                }
                ?>
                <form method="POST" action="../../assets/php/Admin_Functions/create_staff.php">
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                  </div>
                  <div class="mb-3">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="userEmail" name="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userPassword" name="password" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Create Login</button>
                </form>
              </div>
            </div>
          </div>
 
        <!-- Adding new menu items -->
<div class="col-md-6">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4>Add New Menu Item</h4>
        </div>
        <div class="card-body">
            <form action="../../assets/php/Admin_Functions/add_menu_item.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="menuItemName" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="menuItemName" name="menuItemName" required>
                </div>
                <div class="mb-3">
                    <label for="menuItemPrice" class="form-label">Price</label>
                    <input type="text" class="form-control" id="menuItemPrice" name="menuItemPrice" required>
                </div>
                <div class="mb-3">
                    <label for="menuItemDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="menuItemDescription" name="menuItemDescription" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="menuItemPhoto" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="menuItemPhoto" name="menuItemPhoto" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Menu Item</button>
            </form>
        </div>
    </div>
</div>


         <!-- Updating the gallery -->
         <div class="col-md-6">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4>Update Gallery</h4>
        </div>
        <div class="card-body">
          <?php
          if (isset($_SESSION['message'])) {
              echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
              unset($_SESSION['message']);
          }
          ?>
          <form method="POST" action="../../assets/php/Admin_Functions/update_gallery.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="galleryImage" class="form-label">Upload Image</label>
              <input type="file" class="form-control" id="galleryImage" name="galleryImage" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Gallery</button>
          </form>
        </div>
      </div>
    </div>

          <!-- Updating events -->
          <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4>Update Events</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="eventName" class="form-label">Event Name</label>
                    <input type="text" class="form-control" id="eventName" required>
                  </div>
                  <div class="mb-3">
                    <label for="eventDate" class="form-label">Event Date</label>
                    <input type="date" class="form-control" id="eventDate" required>
                  </div>
                  <div class="mb-3">
                    <label for="eventDescription" class="form-label">Event Description</label>
                    <textarea class="form-control" id="eventDescription" rows="3" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Update Event</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>
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
