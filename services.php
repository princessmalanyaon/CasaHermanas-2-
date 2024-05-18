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
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>CASA HERMANAS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!--CART STYLE-->
    <style>
      .cart-btn {
        position: relative;
      }

      .total-count {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: #0f172b;
        color: white;
        border-radius: 50%;
        padding: 5px;
        font-size: 12px;
      }

    </style>

    
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
    <script
      src="https://kit.fontawesome.com/yourcode.js"
      crossorigin="anonymous"
    ></script>

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
                    <a href="http://127.0.0.1/CasaHermanasBackend/services.php" class="nav-item nav-link active">Services</a>
                    <a href="http://127.0.0.1/CasaHermanasBackend/booking.php" class="nav-item nav-link">Booking</a>
                  <a href="http://127.0.0.1/CasaHermanasBackend/contact.php" class="nav-item nav-link">Contact</a>
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
              Our Services
            </h1>
          </div>
        </div>
      </div>
      <!-- Page Header End -->

      <!-- Modal for cart-->
      <div
        class="modal fade"
        id="cart"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="show-cart table"></table>
              <div>Total price: PHP <span class="total-cart"></span></div>
            </div>
            <div class="modal-footer">
              
              <button id="orderNowBtn" type="button" class="btn btn-primary">Order now</button>
              <!--<button type="button" class="btn btn-danger" id="clear-cart-btn">Clear Cart</button>-->
            </div>
          </div>
        </div>
      </div>

      <!--END OF CART MODAL-->

      <!--START OF CHECKOUT MODAL-->
      <form id="checkoutForm">
        <!-- Modal for Checkout Payment -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Cart Summary -->
                <div class="mb-3">
                  <h6>Order Summary</h6>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody id="checkoutCartItems">
                      <!-- Product Information -->
                      <tr>
                        <td><input type="text" name="productName" value="Product 1"></td>
                        <td><input type="number" name="productPrice" value="10.00" step="0.01"></td>
                        <td><input type="number" name="productQuantity" value="1"></td>
                        <td><input type="text" name="productTotal" value="10.00" readonly></td>
                      </tr>
                      <!-- Add more rows for additional products -->
                    </tbody>
                  </table>
                  <div>Total Amount: PHP<span id="checkoutTotalAmount"></span></div>
                </div>
      
                <!-- Payment Method -->
                <div class="mb-3">
                  <h6>Select Payment Method</h6>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1" value="creditCard" checked>
                    <label class="form-check-label" for="paymentMethod1">
                      Cash on Delivery
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2" value="paypal">
                    <label class="form-check-label" for="paymentMethod2">
                      Credit Card
                    </label>
                  </div>
                </div>
      
                <!-- Delivery Options -->
                <div class="mb-3">
                  <h6>Select Delivery Option</h6>
                  <select class="form-select" id="deliveryOption" name="deliveryOption">
                    <option value="standard">Standard Delivery</option>
                    <option value="express">Express Delivery</option>
                  </select>
                </div>
      
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Place Order</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!--END OF CHECKOUT PAYMENT-->

      <!--START OF RECEIPT MODAL-->
<form id="receiptForm">
  <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="receiptModalLabel">Receipt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6>Order Receipt</h6>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="receiptCartItems">
              <!-- Receipt items will be populated here -->
            </tbody>
          </table>
          <div>Total Amount: PHP <span id="receiptTotalAmount"></span></div>
          <div>Payment Method: <span id="receiptPaymentMethod"></span></div>
          <div>Delivery Option: <span id="receiptDeliveryOption"></span></div>
          
          <!-- Hidden inputs to store receipt details -->
          <input type="hidden" name="receiptTotalAmountInput" id="receiptTotalAmountInput">
          <input type="hidden" name="receiptPaymentMethodInput" id="receiptPaymentMethodInput">
          <input type="hidden" name="receiptDeliveryOptionInput" id="receiptDeliveryOptionInput">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
</form>


`<!--END OF RECEIPT MODAL-->


      <!--START OF PRODUCTS-->
      <div class="container-xxl py-5">
        <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Our Offers</h6>
            <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
          </div>

          <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Grazing Table</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Mobile Bar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Mobile Cafe</button>
              </li>
            
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">Catering Services</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">Rooms</button>
            </li>
            <!-- Add more tabs as needed -->
          </ul>
      

          
          <!--GRAZING TABLE-->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
              
              
              <div class="row g-4">
                <div class="row g-4">
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/grazing1.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 1999</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h8 class="mb-0"><b>Charcuterie Delight Platter</b></h8>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <small class="border-end me-3 pe-3"
                            ><i class="fa fa-utensils text-primary me-2"></i>x
                            Pax</small
                          >
                          <small
                            ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                            drinks available</small
                          >
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Charcuterie Delight Platter" data-price="1999">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/grazing2.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 899</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h8 class="mb-0"><b>Mango Graham Parfait</b></h8>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <small class="border-end me-3 pe-3"
                            ><i class="fa fa-utensils text-primary me-2"></i>x
                            Pax</small
                          >
                          <small
                            ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                            drinks available</small
                          >
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                          data-name="Mango Graham Parfait" data-price="899">Add to Cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/grazing3.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 999</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h8 class="mb-0"><b>Fresh Fruit Extravaganza</b></h8>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <small class="border-end me-3 pe-3"
                            ><i class="fa fa-utensils text-primary me-2"></i>x
                            Pax</small
                          >
                          <small
                            ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                            drinks available</small
                          >
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                          data-name="Fresh Fruit Extravaganza" data-price="999">Add to Cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/grazing4.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 1299</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h8 class="mb-0"><b>Gourmet Burger Sliders</b></h8>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <small class="border-end me-3 pe-3"
                            ><i class="fa fa-utensils text-primary me-2"></i>x
                            Pax</small
                          >
                          <small
                            ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                            drinks available</small
                          >
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                          data-name="Gourmet Burger Sliders" data-price="1299">Add to Cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/grazing16.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 899</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h8 class="mb-0"><b>Assorted Donut Delight</b></h8>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <small class="border-end me-3 pe-3"
                            ><i class="fa fa-utensils text-primary me-2"></i>x
                            Pax</small
                          >
                          <small
                            ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                            drinks available</small
                          >
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                          data-name="Assorted Donut Delight" data-price="899">Add to Cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/grazing20.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 799</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h8 class="mb-0"><b>Biscuit and Bread Basket</b></h8>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <small class="border-end me-3 pe-3"
                            ><i class="fa fa-utensils text-primary me-2"></i>x
                            Pax</small
                          >
                          <small
                            ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                            drinks available</small
                          >
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                          data-name="Biscuit and Bread Basket" data-price="799">Add to Cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                      <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                          <img class="img-fluid" src="productsimg/PICTURESSS/grazing5.jpg" alt="" />
                          <small
                            class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                            >PHP 1199</small
                          >
                        </div>
                        <div class="p-4 mt-2">
                          <div class="d-flex justify-content-between mb-3">
                            <h8 class="mb-0"><b>Sweet Indulgence Platter</b></h8>
                            <div class="ps-2">
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                            </div>
                          </div>
                          <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"
                              ><i class="fa fa-utensils text-primary me-2"></i>x
                              Pax</small
                            >
                            <small
                              ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                              drinks available</small
                            >
                          </div>
                          <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                              >View Detail</a
                            >
                            <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                            data-name="Sweet Indulgence Platter" data-price="1299">Add to Cart</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                      <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                          <img class="img-fluid" src="productsimg/PICTURESSS/grazing6.jpg" alt="" />
                          <small
                            class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                            >PHP 1399</small
                          >
                        </div>
                        <div class="p-4 mt-2">
                          <div class="d-flex justify-content-between mb-3">
                            <h8 class="mb-0"><b>Charcuterie Extravaganza</b></h8>
                            <div class="ps-2">
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                            </div>
                          </div>
                          <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"
                              ><i class="fa fa-utensils text-primary me-2"></i>x
                              Pax</small
                            >
                            <small
                              ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                              drinks available</small
                            >
                          </div>
                          <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                              >View Detail</a
                            >
                            <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                            data-name="Charcuterie Extravaganza" data-price="1399">Add to Cart</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                      <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                          <img class="img-fluid" src="productsimg/PICTURESSS/grazing19.jpg" alt="" />
                          <small
                            class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                            >PHP 1599</small
                          >
                        </div>
                        <div class="p-4 mt-2">
                          <div class="d-flex justify-content-between mb-3">
                            <h8 class="mb-0"><b>Savory Meat Medley</b></h8>
                            <div class="ps-2">
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                            </div>
                          </div>
                          <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"
                              ><i class="fa fa-utensils text-primary me-2"></i>x
                              Pax</small
                            >
                            <small
                              ><i class="fa fa-glass-cheers text-primary me-2"></i>No
                              drinks available</small
                            >
                          </div>
                          <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                              >View Detail</a
                            >
                            <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                            data-name="Product9" data-price="10">Add to Cart</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              </div>
            </div>
            <!--END OF TAB 1-->


            <!--MOBILE BAR-->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            
              <div class="row g-4">
                <div class="row g-4">
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/drink7.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 129</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h7 class="mb-0"><b>Shrimp Cocktail</b></h7>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Shrimp Cocktail" data-price="129">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/drink1.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 99</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h7 class="mb-0"><b>Strawberry Margarita</b></h7>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Strawberry Margarita" data-price="99">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/drink6.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 129</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h7 class="mb-0"><b>Cherry Orange Fizz</b></h7>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Cherry Orange Fizz" data-price="129">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/DRINK10.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 129</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h7 class="mb-0"><b>Aperol Spritz</b></h7>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Aperol Spritz" data-price="129">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/drink11.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 119</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h7 class="mb-0"><b>Blue Lagoon Cocktail</b></h7>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Blue Lagoon Cocktail" data-price="119">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                      <div class="position-relative">
                        <img class="img-fluid" src="productsimg/PICTURESSS/drink4.jpg" alt="" />
                        <small
                          class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                          >PHP 149</small
                        >
                      </div>
                      <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                          <h7 class="mb-0"><b>Cabernet Sauvignon</b></h7>
                          <div class="ps-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                            >View Detail</a
                          >
                          <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Cabernet Sauvignon" data-price="149">Add to Cart</a>
      
                        </div>
                      </div>
                    </div>
                  </div>
              </div>       
            </div>
        </div> <!--end of tab2-->


         <!--MOBILE CAFE-->
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            
            <div class="row g-4">
              <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/coffee4.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 79</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Caffe Mocha</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Caffe Mocha" data-price="79">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/cafe6.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 65</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Iced Coffee</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Iced Coffee" data-price="65">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/cafe8.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 85</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Caffe Macchiato</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Caffe Macchiato" data-price="85">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/cafe7.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 79</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Latte</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Latte" data-price="79">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/cafe10.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 75</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Cold Brew</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Cold Brew" data-price="75">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/cafe4.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 85</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Ristretto</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                     data-name="Ristretto" data-price="85">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>       
          </div>
       </div> <!--div close for cafe-->

         <!--ROOMS-->
         <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4 -tab">
            
            <div class="row g-4">
              <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/room-1.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 1</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 1" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/room-2.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 2</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 2" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/room-3.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 3</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 3" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/bed2.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 4</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 4" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/bed1.png" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 5</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 5" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/bed 3.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 6</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 6" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/bed4.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 7</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 7" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/bed5.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 8</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 8" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="img/bed6.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 1610</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Room 9</h6>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>
                           Free Breakfast in Bed</small
                        >
                        <small><i class="fa fa-wifi text-primary me-2"></i>Free Wifi</small>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="booking.html" class="btn btn-sm btn-dark rounded py-2 px-4 btn-effect"
                          data-name="Room 9" data-price="1610">Book Now</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
            </div>          
          </div>
      </div> <!--div close for room-->
           


        <!--CATERING SERVICES-->
        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5 -tab">

            <div class="row g-4">
              <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food1.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pancit Palabok</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                         data-name="Pancit Palabok" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food2.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pork Steak</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Pork Steak" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food3.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Chopsuey</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks </small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Chopsuey" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food4.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Lechon</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks </small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Lechon" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food6.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Chicken Piccata</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Chicken Piccata" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food10.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Adobong Pusit</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Adobong Pusit" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food11.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pork Liver Adobo</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Pork Liver Adobo" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food12.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pork Stir Fry</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Pork Stir Fry" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food13.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pork Adobo</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Pork Adobo" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food16.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Embutido</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Embutido" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food18.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Seafood in Coconut Milk</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Seafood in Coconut Milk" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food19.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pork Menudo</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Pork Menudo" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food20.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Rice Vermicelli</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Rice Vermicelli" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food23.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Grilled Goat</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Grilled Goat" data-price="399">Add to Cart</a>
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food24.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Lumpia Spring Roll</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
                        data-name="Lumpia Spring Roll" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food25.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Shrimp in Garlic Sauce</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
            data-name="Shrimp in Garlic Sauce" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food26.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Chicken with Sauce</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Chicken with Sauce" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food28.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Grilled Chicken</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Grilled Chicken" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food29.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Coconut Curry Chicken</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Coconut Curry Chicken" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food30.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Coconut Stir Fry</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Coconut Stir Fry" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food31.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Coconut-Crusted Fish</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Coconut-Crusted Fish" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food32.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Coconut Curry Vegetables</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Coconut Curry Vegetables" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food33.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Vegetable Lasagna</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Vegetable Lasagna" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                      <img class="img-fluid" src="productsimg/PICTURESSS/food27.jpg" alt="" />
                      <small
                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"
                        >PHP 399</small
                      >
                    </div>
                    <div class="p-4 mt-2">
                      <div class="d-flex justify-content-between mb-3">
                        <h7 class="mb-0"><b>Pork in Sauce</b></h7>
                        <div class="ps-2">
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                          <small class="fa fa-star text-primary"></small>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <small class="border-end me-3 pe-3"
                          ><i class="fa fa-utensils text-primary me-2"></i>x
                          Pax</small
                        >
                        <small
                          ><i class="fa fa-glass-cheers text-primary me-2"></i>With
                          drinks</small
                        >
                      </div>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-sm btn-primary rounded py-2 px-4" href=""
                          >View Detail</a
                        >
                        <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 add-to-cart btn-effect"
          data-name="Pork in Sauce" data-price="399">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>          
          </div>
     </div> <!--div close for events-->
                
        </div> <!--div close for tab content-->

          </div>
        </div>
      </div>

      <!--services end-->

      <!-- Testimonial Start -->
      <div
        class="container-xxl testimonial mt-5 py-5 bg-dark wow zoomIn"
        data-wow-delay="0.1s"
        style="margin-bottom: 150px"
      >
      <div class="container">
        <div class="owl-carousel testimonial-carousel py-5">
          <div
            class="testimonial-item position-relative bg-white rounded overflow-hidden"
          >
            <p style="text-align: justify;">
              we had to find a place to stay for the night to work dahil nawalan kami ng internet.
               we’re able to avail of their 1610 promo with free breakfast
                (masarap din ang food) they have accommodating and friendly staff and they didn’t charge extra for us working 😅 
                (this was disclosed upon check in) so super thankful we didnt get charged for bringing and using our laptops 🙏🏻🥹
               highly recommended and will definitely be back again 🎉🥳
            </p>
            <div class="d-flex align-items-center">
              <img
                class="img-fluid flex-shrink-0 rounded"
                src="img/karen.jpg"
                style="width: 45px; height: 45px"
              />
              <div class="ps-3">
                <h6 class="fw-bold mb-1">Karen Bee</h6>
              </div>
            </div>
            <i
              class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
            ></i>
          </div>
          <div
            class="testimonial-item position-relative bg-white rounded overflow-hidden"
          >
            <p style="text-align: justify;">
              I celebrated my birthday here yesterday,
               It was indeed a memorable experience for me, my family & my guests. 
               The food was delicious especially the pizza.
               This place is beautiful, thank you ❤️☺️
            </p>
            <div class="d-flex align-items-center">
              <img
                class="img-fluid flex-shrink-0 rounded"
                src="img/ANGELA.jpg"
                style="width: 45px; height: 45px"
              />
              <div class="ps-3">
                <h6 class="fw-bold mb-1">Angela Dane Loquinerio</h6>
              </div>
            </div>
            <i
              class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
            ></i>
          </div>
          <div
            class="testimonial-item position-relative bg-white rounded overflow-hidden"
          >
            <p style="text-align: justify;">
              Celebrated my child's 2nd birthday and my uncle's birthday here last night. 
              Staffs were polite and helpful. The food was really good and the place was nice especially at night. 
              Thank you Casa Hermanas ❤️
            </p>
            <div class="d-flex align-items-center">
              <img
                class="img-fluid flex-shrink-0 rounded"
                src="img/JAN.jpg"
                style="width: 45px; height: 45px"
              />
              <div class="ps-3">
                <h6 class="fw-bold mb-1">Jan April</h6>
              </div>
            </div>
            <i
              class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
            ></i>
          </div>
          <div
            class="testimonial-item position-relative bg-white rounded overflow-hidden"
          >
            <p style="text-align: justify;">
              love the ambience... food choices are highly recommended... 
              You may ask, "how's the taste?" Well, my Bicolana palate says, "manamit!" ♥️
            </p>
            <div class="d-flex align-items-center">
              <img
                class="img-fluid flex-shrink-0 rounded"
                src="img/HAZEL.jpg"
                style="width: 45px; height: 45px"
              />
              <div class="ps-3">
                <h6 class="fw-bold mb-1">Hazel Asejo Lobetania</h6>
              </div>
            </div>
            <i
              class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
            ></i>
          </div>
          <div
            class="testimonial-item position-relative bg-white rounded overflow-hidden"
          >
            <p style="text-align: justify;">
              Highly recommended, a place where you can dine superb taste of Filipino-Spanish fusion, 
              thank you for our friend and owner Menna Morales, 
              for our wonderful visit in Legazpi, Bicol👍😘❤️
            </p>
            <div class="d-flex align-items-center">
              <img
                class="img-fluid flex-shrink-0 rounded"
                src="img/mc.jpg"
                style="width: 45px; height: 45px"
              />
              <div class="ps-3">
                <h6 class="fw-bold mb-1">Mc Cris Mercado</h6>
              </div>
            </div>
            <i
              class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
            ></i>
          </div>
          <div
            class="testimonial-item position-relative bg-white rounded overflow-hidden"
          >
            <p style="text-align: justify;">
              Casa Hermanas Legazpi is a culinary gem that brings the vibrant flavors of the Province of Bicol to life in every bite. From the moment you step through the door, you're transported to a world where traditional Bicolano cuisine meets modern sophistication.
              The food at Casa Hermanas Legazpi is a true celebration of Bicol's rich culinary heritage. Each dish is a masterpiece, showcasing the bold and spicy flavors that the region is renowned for. 
               But it's not just the food that makes Casa Hermanas Legazpi stand out – it's the exceptional staff who bring the dining experience to life. 
            </p>
            <div class="d-flex align-items-center">
              <img
                class="img-fluid flex-shrink-0 rounded"
                src="img/RA.jpg"
                style="width: 45px; height: 45px"
              />
              <div class="ps-3">
                <h6 class="fw-bold mb-1">RA Corneta</h6>
              </div>
            </div>
            <i
              class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"
            ></i>
          </div>
        </div>
      </div>
      </div>
      <!-- Testimonial End -->

     <!-- Newsletter Start -->
     <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="row justify-content-center">
        
      </div>
    </div>
    <!-- Newsletter Start -->

    <!-- Footer Start -->
    <div
      class="container-fluid bg-dark text-light footer wow fadeIn"
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
              <p class="text-white mb-0" style="text-align: justify;">
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
              <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/CasaHermanasLGP"
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/CasaHermanasLGP"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/CasaHermanasLGP"
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/CasaHermanasLGP"
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
                <a class="btn btn-link" href="events.html">Services</a>
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
                <a class="btn btn-link" href="events.html">Events & Catering Services</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright  text-center">
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved | Casa Hermanas
        </div>
      </div>
    </div>
    <!-- Footer End -->

      <!--CART fucntion-->

      <a
        href="#"
        style="margin-bottom: 70px"
        class="btn btn-lg btn-primary btn-lg-square cart-btn"
        data-toggle="modal"
        data-target="#cart"
        ><i class="fas fa-shopping-cart"></i>
        <span class="total-count">0</span></a
      >



      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
        ><i class="bi bi-arrow-up"></i
      ></a>
    </div>

    <!-- jQuery FOR CART-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



      <!-- Scripts FOR TAB
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-5YhDD+Qv5mV8vuF1+CxWJ4uqzd9s2U6Y/ZCb7U4V6kPOViACicDO8CG3WgQ77B5G" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha384-pwu8F+JIhi0j2tcSj1hVW+6b0B9aUv3wHX6rVSAFqlDO9RkQ5TgGPVCw1zoOJJGh" crossorigin="anonymous"></script>
<script>
  // Initialize Bootstrap tab functionality
  var tabTriggerList = document.querySelectorAll('[data-bs-toggle="tab"]');
  tabTriggerList.forEach(function (tabTrigger) {
    new bootstrap.Tab(tabTrigger);
  });
</script>-->

<!-- Include Bootstrap CSS and JS files -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize Bootstrap tab functionality for each tab trigger
    var tabTriggers = document.querySelectorAll('[data-bs-toggle="tab"]');
    tabTriggers.forEach(function (tabTrigger) {
      tabTrigger.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default anchor behavior
        var targetTabId = this.getAttribute('data-bs-target'); // Get the target tab ID
        var targetTab = document.querySelector(targetTabId); // Find the target tab content
        if (targetTab) {
          new bootstrap.Tab(targetTab).show(); // Show the target tab content
        }
      });
    });
  });
</script>




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
    

  
</html>