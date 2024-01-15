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
  <title>Can I GO</title>
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

  <div class="preloader">
    <div class="loader">
      <div class="spinner">
        <div class="spinner-container">
          <div class="spinner-rotator">
            <div class="spinner-left">
              <div class="spinner-circle"></div>
            </div>
            <div class="spinner-right">
              <div class="spinner-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="hero-section-wrapper-3 mb-100">

    <header class="header header-5">
      <div class="navbar-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                  <img src="images/logo.png" alt="Logo" />
                </a>
                

              </nav>

            </div>
          </div>

        </div>

      </div>

    </header>


    <div class="hero-section hero-style-3 img-bg" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-8">
            <div class="hero-content-wrapper">
              <div class="content">
                <h2 class="mb-30"><span class="mb-30" style="color:blue;">AITRC's
                  </span>Smart System</h2>
                <p class="mb-40">"Experience the future of leave management at AITRC.Say goodbye to paperwork and hello
                  to convenience. Join us in making leave management effortless."</p>
                <div class="buttons">
                  <a href="student\login.php" class="button button-lg radius-3">STUDENT</a>
                  <a href="hod\login.php" class="button button-lg radius-3">HOD</a>
                  <a href="teacher\login.php" class="button button-lg radius-3">TEACHER</a>
                  <a href="guard\login.php" class="button button-lg radius-3">GUARD</a>
                </div>
              </div>
              <div class="image">
                <img src="assets/img/hero/hero-3/hero-img.svg" alt>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shapes">
        <img src="assets/img/hero/hero-3/shape-1.svg" alt class="shape shape-1">
        <img src="assets/img/hero/hero-3/shape-2.svg" alt class="shape shape-2">
        <img src="assets/img/hero/hero-3/shape-3.svg" alt class="shape shape-3">
        <img src="assets/img/hero/hero-3/shape-4.svg" alt class="shape shape-4">
        <img src="assets/img/hero/hero-3/shape-5.svg" alt class="shape shape-5">
        <img src="assets/img/hero/hero-3/shape-6.svg" alt class="shape shape-6">
        <img src="assets/img/hero/hero-3/shape-7.svg" alt class="shape shape-7">
        <img src="assets/img/hero/hero-3/shape-8.svg" alt class="shape shape-8">
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