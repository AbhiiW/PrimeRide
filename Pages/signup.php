<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Gallery Cafe | SignUp</title>
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
          
        </header>
    </div>
</div>


  <!-- Hero Section -->

  <!-- Signupform -->
  <section class="vh-100 signupform">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <?php
                                session_start();
                                if (isset($_SESSION['success_message'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                    echo '<input type="hidden" id="redirectUrl" value="login.php">';
                                    unset($_SESSION['success_message']);
                                }
                                if (isset($_SESSION['error_message'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                                    unset($_SESSION['error_message']);
                                }
                                ?>

                                <form class="mx-1 mx-md-4" method="POST" action="../assets/php/register.php">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" class="form-control" name="name" required />
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3c" class="form-control" name="email" required />
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" class="form-control" name="password" required />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cd" class="form-control" required />
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="#!">Terms of service</a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img src="../assets/photo/signupposter.png" class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
  <script src="../assets/js/redirect.js"></script>
</body>
</html>
