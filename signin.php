<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 600px;
  height: 400px;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background:  linear-gradient(to right, #244cfd, #15e4fd);
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('https://goo.gl/YbktSj');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 30px;
  color: black;
  text-align: center;
  font-weight: bold;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}</style>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Page Title -->
    <title>Sign In</title>

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
    <header class="header-area">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 d-md-flex">
              <h6 class="mr-3">
                <span class="mr-2"><i class="fa fa-mobile"></i></span> call us
                now! +1 305 708 2563
              </h6>
              <h6 class="mr-3">
                <span class="mr-2"><i class="fa fa-envelope-o"></i></span>
                medical@example.com
              </h6>
              <h6>
                <span class="mr-2"><i class="fa fa-map-marker"></i></span> Find
                our Location
              </h6>
            </div>
            <div class="col-lg-3">
              <div class="social-links">
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-vimeo"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="header" id="home">
        <div class="container">
          <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
              <a href="index.html"
                ><img
                  style="width: auto; max-height: 70px; max-width: 100%; height: auto;"
                  src="assets/images/logo/logo.png"
                  alt=""
                  title=""
              /></a>
            </div>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <li class="menu-active"><a href="index.html">Home</a></li>
                <li><a href="departments.html">Radiology</a></li>
                <li><a href="doctors.html">doctors</a></li>

                <li><a href="about.html">about us</a></li>

                <li><a href="contact.html">Contact</a></li>
                <li><a href="signin.html">Sign in</a></li>
              </ul>
            </nav>
            <!-- #nav-menu-container -->
          </div>
        </div>
      </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area other-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

<?php

require_once "usercontroller.php";
$c = new usercontroller();
$c->viewsignin();
     
     ?>
            <a href="index.html">Home</a> <span>|</span>
            <a href="signin.html">Login</a>
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
