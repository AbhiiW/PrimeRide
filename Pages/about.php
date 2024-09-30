<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Gallery Cafe | About</title>
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
          <li class="nav-item"><a href="../index2.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="Menu.html" class="nav-link">Menu</a></li>
          <li class="nav-item"><a href="booking.php" class="nav-link">Bookings</a></li>
          <li class="nav-item"><a href="events.html" class="nav-link">Events</a></li>
        </ul>
      </header>
    </div>
  </div>

  <!-- Hero Section -->

  <!-- Small Header -->




  </header>
<!-- End of small Header -->

  <div class="about">
    <div class="px-4 pt-5 my-5 text-center border-bottom abuthead">
      <h1 class="display-4 fw-bold  abuthead">The Gallery Cafe</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Nestled in the vibrant heart of Colombo,
          The Gallery Café stands as a beacon of culinary excellence and artistic expression.
          Housed in a beautifully restored colonial mansion, our café offers an enchanting ambiance where history and
          contemporary design harmoniously blend.
          Adorned with exquisite artworks, our space provides a chic yet welcoming atmosphere that makes every visit a
          sensory delight.
          Our menu is a testament to Chef Arjun's travels and his passion for blending flavors from around the world. We
          offer an eclectic mix of Italian, Sri Lankan, Chinese, and Korean cuisines, each crafted with the finest
          ingredients and utmost care.
          Our featured dishes, such as the rich and creamy Italian Fettuccine Alfredo, the spicy Sri Lankan Fish Ambul
          Thiyal, the delicate Chinese Dim Sum, and the vibrant Korean Bibimbap, promise to take you on a delightful
          gastronomic adventure.
          At The Gallery Café, dining is more than just eating; it's an experience. Our elegant décor and art pieces
          create the perfect setting for any occasion, whether it's a romantic dinner, a family gathering, or a business
          meeting. With our seamless online reservation system, you can easily secure your table and look forward to an
          unforgettable dining experience. Join us at The Gallery Café, where every meal is a masterpiece and every
          visit is a celebration of flavors and togetherness.

        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
          <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Gallery</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
        </div>
      </div>
      <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
          <img src="../assets/Photo/Cafe image.jpg" class="img-fluid border rounded-3 shadow-lg mb-4"
            alt="Example image" width="700" height="500" loading="lazy">
        </div>
      </div>
    </div>
  </div>


  <!-- Contact Us Section -->

  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2 class="featurette-heading fw-normal lh-1 labeld">Contact<span class="text-body-secondary"> </span></h2><br><br><br><br>
        <p>             The Gallery Café in Colombo offers a diverse menu of Italian, Sri Lankan, Chinese, and Korean cuisines. With a chic, contemporary ambiance, it's perfect for any occasion. Skilled chefs use the finest ingredients, and the restaurant offers an online reservation system for convenience.</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bi bi-geo-alt-fill"></i>
                <h3>Our Address</h3>
                <p>St Peters Street Colombo 04</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>thegallerycafe@gmail.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bi bi-telephone-fill"></i>
                <h3>Call Us</h3>
                <p>+94112587968</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->


<!-- Gallery  -->

<div class="swiper-slide" role="group" aria-label="2 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="1"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide" role="group" aria-label="3 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="2"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide" role="group" aria-label="4 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="3"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide" role="group" aria-label="5 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="4"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide" role="group" aria-label="6 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="5"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide swiper-slide-prev" role="group" aria-label="7 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="6"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide swiper-slide-active" role="group" aria-label="8 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="7"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div><div class="swiper-slide swiper-slide-next" role="group" aria-label="1 / 8" style="width: 218.667px; margin-right: 20px;" data-swiper-slide-index="0"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div></div>
<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 7"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 8" aria-current="true"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

</div>

</section>


<section id="gallery" class="gallery">
<div class="container-fluid">
<div class="section-title">
<h2>Some photos from <span>Our Restaurant</span></h2>
<p>Memories of Gallery Cafe</p>
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
                      <img src="../assets/Photo/' . $row["image_path"] . '" alt="" class="img-fluid">
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
</section><!-- End Gallery Section -->




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