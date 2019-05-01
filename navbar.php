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

 
 <?php
 require_once("SharedFacadeUserAndDoctor.php");
//  $u = new usercontroller();
//  $u->shownavbar();

 $user= new SharedFacade();
 $user->User->shownavbar();

 ?>

<body>
    <div class="preloader">
      <div class="spinner"></div>
    </div>
    <section class="banner-area other-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
    
</body>
</html>