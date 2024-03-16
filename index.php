<?php
  session_start();
  if(isset($_SESSION["username"])===null){
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html class="no-js" lang>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Home</title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg" />


    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-alpha-2.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/lindy-uikit.css" />
</head>
<body style="background: #fff">
    <section id="home" class="hero-section-wrapper-4">

        <header class="header header-3 sticky">
        <div class="navbar-area">
        <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
        <img src="images\logo.png" alt="Logo" height="50" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent3">
        <ul id="nav3" class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
        <a class="page-scroll active" href="#home">Home</a>
        </li>
        <li class="nav-item">
        <a class="page-scroll" href="#services">Services</a>
        </li>
        <li class="nav-item">
        <a class="page-scroll" href="#about">About</a>
        </li>
        <li class="nav-item">
        <a class="page-scroll" href="#gallery">Portfolio</a>
        </li>
        <li class="nav-item">
        <a class="page-scroll" href="#pricing">Pricing</a>
        </li>
        <li class="nav-item">
        <a class="page-scroll" href="#contact">Contact</a>
        </li> -->
        </ul>
        <!-- <div class="d-none d-lg-flex">
        <a href="#0" class="button button-sm border-button radius-30 mr-20">Quote</a>
        <a href="#0" class="button button-sm radius-30">Contact</a>
        </div> -->
        </div>
        
        </nav>
        
        </div>
        </div>
        
        </div>
        
        </div>
        
        </header>
        
        
        <div class="hero-section hero-style-4">
        <div class="container position-static">
        <div class="row  mb-4">
        <div class="col-lg-6">
        <div class="hero-content-wrapper position-static">
        <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Welcome To The Leave Manangement System</h2>
        <p class="mb-30 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam, magni.</p>
        <a href="student\login.php" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Student</a>
        <a href="teacher\login.php" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Teacher</a>
        <a href="hod\login.php" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">HOD</a>
        <a href="Principal\login.php" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Principal</a>
        <a href="guard\login.php" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Guard</a>
        </div>
        </div>
        <div class="col-lg-6 align-self-end">
        <div class="hero-image wow fadeInLeft" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
        <img src="images\hero-img.svg" alt="">
        </div>
        </div>
        </div>
        </div>
        <div class="shapes">
        <img src="assets/img/hero/hero-4/shape-1.svg" alt="" class="shape shape-1">
        <img src="assets/img/hero/hero-4/shape-2.svg" alt="" class="shape shape-2">
        <img src="assets/img/hero/hero-4/shape-3.svg" alt="" class="shape shape-3">
        </div>
        </div>
        
        </section>

        
        <script src="assets/js/bootstrap.5.0.0.alpha-2-min.js"></script>
        <script src="assets/js/tiny-slider.js"></script>
        <script src="assets/js/count-up.min.js"></script>
        <script src="assets/js/imagesloaded.min.js"></script>
        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/glightbox.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
    <script>
        // header-3  toggler-icon
        let navbarToggler3 = document.querySelector(".header-3 .navbar-toggler");
        var navbarCollapse3 = document.querySelector(".header-3 .navbar-collapse");

        document.querySelectorAll(".header-3 .page-scroll").forEach(e =>
            e.addEventListener("click", () => {
                navbarToggler3.classList.remove("active");
                navbarCollapse3.classList.remove('show')
            })
        );
        navbarToggler3.addEventListener('click', function () {
            navbarToggler3.classList.toggle("active");
        });

    </script>
</body>

</html>