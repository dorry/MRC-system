<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
  <head>

    <!-- Required Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Page Title -->
    <title>Admin Panel</title>

    <!-- Favicon -->
    <link
      rel="shortcut icon"
      href="assets/images/logo/favicon.png"
      type="image/x-icon"
    />

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css" />
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css" />
    <link rel="stylesheet" href="assets/css/linearicons.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- Preloader Starts -->
    <div class="preloader">
      <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <?php include("navbar.php"); ?>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area other-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">



<div>
  <h2>Admin Options : </h2>
  <a href="Retrive.php"> <h3>   - Retrive Data of all accounts </h3></a>
  <a href="Roles.php"> <h3>   - Manage Roles </h3></a>



</div>


  

          </div>
        </div>
      </div>
    </section>
    <!-- Banner Area End -->
    <!-- Welcome Area Starts -->
    <!-- Welcome Area End -->
    <!-- Patient Area Starts -->
    <!-- Patient Area Starts -->




    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
      <div class="footer-widget">
        <div class="container">
          <div class="row">
            <div class="col-xl-2 col-lg-3">
              <div class="single-widget-home mb-5 mb-lg-0">
                <h3 class="mb-4">top products</h3>
                <ul>
                  <li class="mb-2"><a href="#">managed website</a></li>
                  <li class="mb-2"><a href="#">managed reputation</a></li>
                  <li class="mb-2"><a href="#">power tools</a></li>
                  <li><a href="#">marketing service</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6">
              <div class="single-widget-home mb-5 mb-lg-0">
                <h3 class="mb-4">newsletter</h3>
                <p class="mb-4">
                  You can trust us. we only send promo offers, not a single.
                </p>
                <form action="#">
                  <input
                    type="email"
                    placeholder="Your email here"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Your email here'"
                    required
                  />
                  <button type="submit" class="template-btn">
                    subscribe now
                  </button>
                </form>
              </div>
            </div>
            <div class="col-xl-3 offset-xl-1 col-lg-3">
              <div class="single-widge-home">
                <h3 class="mb-4">instagram feed</h3>
                <div class="feed">
                  <img src="assets/images/feed1.jpg" alt="feed" />
                  <img src="assets/images/feed2.jpg" alt="feed" />
                  <img src="assets/images/feed3.jpg" alt="feed" />
                  <img src="assets/images/feed4.jpg" alt="feed" />
                  <img src="assets/images/feed5.jpg" alt="feed" />
                  <img src="assets/images/feed6.jpg" alt="feed" />
                  <img src="assets/images/feed7.jpg" alt="feed" />
                  <img src="assets/images/feed8.jpg" alt="feed" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <span>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with
                <i class="fa fa-heart-o" aria-hidden="true"></i> by
                <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </span>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="social-icons">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
