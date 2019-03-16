<!DOCTYPE html>
<html>

<head>

        <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Navbar</title>
</head>

  <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 d-md-flex">
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! +1 305 708 2563</h6>
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span> medical@example.com</h6>
                        <h6><span class="mr-2"><i class="fa fa-map-marker"></i></span> Find our Location</h6>
                    </div>
                    <div class="col-lg-3">
                        <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
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
                    <a  href="index.php"><img style ="width: auto; max-height: 70px; max-width: 100%; height: auto;"src="assets/images/logo/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.php">Home</a></li>
                        <li><a href="departments.php">Radiology</a></li>
                        <li><a href="doctors.php">doctors</a></li>
                        
                         <li><a href="about.php">about us</a></li>
                       
                        <li><a href="contact.php">Contact</a></li>
                        <?php
                        if(!empty($_SESSION))
                        {
                            
                            // echo "<div class='dropdown'>";
                            echo "<li><a href=''>".$_SESSION['username']."</a></li> ";
                            foreach(array_combine($_SESSION['link'],$_SESSION['pagename']) as $links=>$pagenames){
                                
                            echo "<li><a href='".$links."'>".$pagenames."</a></li> ";
                            }
                            echo "<li><a href='signout.php'>SIGNOUT</a></li> ";
                            echo "<li><a href='DeleteProfile.php'>Delete my account</a></li> ";

                            // echo "<i class='fa fa-caret-down'></i>";
                            // echo "</button>";
                            // echo "<div class='dropdown-content' id='myDropdown'>";
                            // echo "<a href='ProfilePage.php'>Account</a>";
                            // echo "<a href='Messages.php' id ='messages'>Messages</a>";
                            // echo "<form action = 'signout.php'>";
                            // echo "<li><button class= 'Signout' id='signout'> Signout</button></li>";
                            // echo "</form>";
                            // $isLogedIn = 1;
                            // json_encode($isLogedIn);
                            // echo "</div>";
                            // echo "</div>";
                        }
                        else
                        {
                            echo '<li><a href="signin.html">Sign in</a></li>';
                        }
                        ?>       				          
                    </ul>
                </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </div>
    </header>

    <body>

</body>
</html>