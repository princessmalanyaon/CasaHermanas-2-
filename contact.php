<!--
<?php
session_start();

// Check if the link is clicked and session destruction flag is set
if(isset($_GET['destroy_session'])) {
  // Unset specific session variables if needed
  if(isset($_SESSION['foo'])) {
      unset($_SESSION['foo']);
      // Optionally, perform other actions or unset other session variables
  }
  
  // Destroy the session
  session_destroy();
  
  // Redirect the user to Form.php using JavaScript
  echo '<script>window.location.href = "newlogin-signup.php";</script>';
  exit; // Ensure script execution stops here
}?>
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>CASA HERMANAS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link
      href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
      rel="stylesheet"
    />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="container-xxl bg-white p-0">
      <!-- Spinner Start -->
      <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- Spinner End -->

      <!-- Header Start -->
      <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
          <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a
              href="http://127.0.0.1/CasaHermanasBackend/index.php"
              class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center"
            >
              <h2 class="m-0 text-primary text-uppercase">CASA HERMANAS</h2>
            </a>
          </div>
          <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
              <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                  <i class="fa fa-envelope text-primary me-2"></i>
                  <p class="mb-0">aimeescasahermanas@gmail.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-2">
                  <i class="fa fa-phone-alt text-primary me-2"></i>
                  <p class="mb-0">0946 453 0241</p>
                </div>
              </div>
              <div class="col-lg-5 px-5 text-end">
                <div class="d-inline-flex align-items-center py-2">
                  <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                  <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                  <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                  <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                  <a class="" href=""><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
              <a href="http://127.0.0.1/CasaHermanasBackend/index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 text-primary text-uppercase">Casa Hermanas</h1>
              </a>
              <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarCollapse"
              >
                <div class="navbar-nav mr-auto py-0">
                  <a href="http://127.0.0.1/CasaHermanasBackend/index.php" class="nav-item nav-link">Home</a>
                  <a href="http://127.0.0.1/CasaHermanasBackend/about.php" class="nav-item nav-link">About</a>
                  <a href="http://127.0.0.1/CasaHermanasBackend/services.php" class="nav-item nav-link">Services</a>
                  <a href="http://127.0.0.1/CasaHermanasBackend/booking.php" class="nav-item nav-link">Booking</a>
                  <a href="http://127.0.0.1/CasaHermanasBackend/contact.php" class="nav-item nav-link active"
                    >Contact</a
                  >
                </div>
                <div class="dropdown">
                         <button class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                         <?php
                        if(isset($_SESSION['userName'])) {
                        echo " " . $_SESSION['userName'];
                        }
                         ?>
                        <i class="fas fa-user ms-3"></i>
                        </button>
                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <a class="dropdown-item" href="#">My Account</a>    
                        <a class="dropdown-item" href="?destroy_session=1">Log Out</a>
                   </div>
                  </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <!-- Header End -->

      <!-- Page Header Start -->
      <div
        class="container-fluid page-header mb-5 p-0"
        style="background-image: url(img/carousel-1.jpg)"
      >
        <div class="container-fluid page-header-inner py-5">
          <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
              Contact
            </h1>
          </div>
        </div>
      </div>
      <!-- Page Header End -->

      <!-- Booking Start -->
      <div
        class="container-fluid booking pb-5 wow fadeIn"
        data-wow-delay="0.1s"
      ></div>
      <!-- Booking End -->

      <!-- Contact Start -->
      <div class="container-xxl py-5" style="margin-bottom: 150px">
        <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">
              Contact Us
            </h6>
          </div>
          <div class="row g-4">
            <div class="col-12">
              <div class="row gy-4">
                <div class="col-md-4">
                  <h6
                    class="section-title text-start text-primary text-uppercase"
                  >
                    Booking
                  </h6>
                  <p>
                    <i class="fa fa-envelope-open text-primary me-2"></i
                    >casahermanas@gmail.com
                  </p>
                </div>
                <div class="col-md-4">
                  <h6
                    class="section-title text-start text-primary text-uppercase"
                  >
                    General
                  </h6>
                  <p>
                    <i class="fa fa-envelope-open text-primary me-2"></i
                    >aimeescasahermanas@gmail.com
                  </p>
                </div>
                <div class="col-md-4">
                  <h6
                    class="section-title text-start text-primary text-uppercase"
                  >
                    Technical
                  </h6>
                  <p>
                    <i class="fa fa-envelope-open text-primary me-2"></i
                    >aimeescasahermanas@gmail.com
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
              <iframe
                class="position-relative rounded w-100 h-100"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15703.270240987566!2d123.7324243!3d13.1400315!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a103209145b299%3A0xe6cf285436240bd8!2sCasa%20Hermanas%20Legazpi!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                frameborder="0"
                style="min-height: 350px; border: 0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"
              ></iframe>
            </div>

            <div class="col-md-6">
              <div class="wow fadeInUp" data-wow-delay="0.2s">

              <!--Form-->
              <form method="post" action="contactBE.php">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
                        <label for="name">Your Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" />
                        <label for="subject">Subject</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 150px"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                </div>
            </div>
        </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Contact End -->

      <!-- Newsletter Start -->
      <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center"></div>
      </div>
      <!-- Newsletter Start -->

      <!-- Footer Start -->
      <div
        class="container-fluid bg-dark text-light footer wow fadeIn py-5"
        data-wow-delay="0.1s"
      >
        <div class="container pb-5">
          <div class="row g-5">
            <div class="col-md-6 col-lg-4">
              <div class="bg-primary rounded p-4">
                <a href="http://127.0.0.1/CasaHermanasBackend/index.php"
                  ><h1 class="text-white text-uppercase mb-3">
                    Casa Hermanas
                  </h1></a
                >
                <p class="text-white mb-0" style="text-align: justify">
                  Where classic elegance meets modern comfort in an ancestral
                  setting. Immerse yourself in heritage-inspired cuisine and
                  charming ambiance, where tradition and allure converge
                  seamlessly.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6
                class="section-title text-start text-primary text-uppercase mb-4"
              >
                Contact
              </h6>
              <p class="mb-2">
                <i class="fa fa-map-marker-alt me-3"></i>#18 Vinzon St. Barangay
                7 - Bano, Old Albay, Legazpi, Philippines
              </p>
              <p class="mb-2">
                <i class="fa fa-phone-alt me-3"></i>0946 453 0241
              </p>
              <p class="mb-2">
                <i class="fa fa-envelope me-3"></i>casahermanas@gmail.com
              </p>
              <div class="d-flex pt-2">
                <a
                  class="btn btn-outline-light btn-social"
                  href="https://www.facebook.com/CasaHermanasLGP"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light btn-social"
                  href="https://www.facebook.com/CasaHermanasLGP"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light btn-social"
                  href="https://www.facebook.com/CasaHermanasLGP"
                  ><i class="fab fa-youtube"></i
                ></a>
                <a
                  class="btn btn-outline-light btn-social"
                  href="https://www.facebook.com/CasaHermanasLGP"
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-5 col-md-12">
              <div class="row gy-5 g-4">
                <div class="col-md-6">
                  <h6
                    class="section-title text-start text-primary text-uppercase mb-4"
                  >
                    Quick Links
                  </h6>
                  <a class="btn btn-link" href="http://127.0.0.1/CasaHermanasBackend/index.php">Home</a>
                  <a class="btn btn-link" href="http://127.0.0.1/CasaHermanasBackend/about.php">About</a>
                  <a class="btn btn-link" href="http://127.0.0.1/CasaHermanasBackend/services.php">Services</a>
                  <a class="btn btn-link" href="http://127.0.0.1/CasaHermanasBackend/booking.php">Reservation</a>
                  <a class="btn btn-link" href="http://127.0.0.1/CasaHermanasBackend/contact.php">Contact</a>
                </div>
                <div class="col-md-6">
                  <h6
                    class="section-title text-start text-primary text-uppercase mb-4"
                  >
                    Services
                  </h6>
                  <a class="btn btn-link" href="room.html">Rooms</a>
                  <a class="btn btn-link" href="grazing.html">Grazing Table</a>
                  <a class="btn btn-link" href="bar.html">Mobile Bar</a>
                  <a class="btn btn-link" href="cafe.html">Mobile Cafe</a>
                  <a class="btn btn-link" href="events.html"
                    >Events & Catering Services</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="copyright text-center">
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | Casa Hermanas
          </div>
        </div>
      </div>
      <!-- Footer End -->

      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
        ><i class="bi bi-arrow-up"></i
      ></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>