<?php
        session_start();
        if(isset($_SESSION["username"])==true) {
          echo'<script>alert("You are already logged in");</script>';
          header('Location: hod_home.php');
        }
?>
</html>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>HOD Login</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg" />
  <!-- Place favicon.ico in the root directory -->

  <!-- ========================= CSS here ========================= -->
  <link rel="stylesheet" href="CanIGo-1\assets\css\bootstrap-5.0.0-alpha-2.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-alpha-2.min.css" />
  <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
  <link rel="stylesheet" href="assets/css/tiny-slider.css" />
  <link rel="stylesheet" href="assets/css/glightbox.min.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/lindy-uikit.css" />
</head>

<body style="background-color: #f3f3f3">

  <!-- ========================= preloader start ========================= -->
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
  <!-- ========================= preloader end ========================= -->

  <!-- ========================= signup-style-1 start ========================= -->
  <section class="signup signup-style-1 mb-80">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="signup-content-wrapper">
            <div class="section-title">
              <h3 class="mb-20">Login</h3>
            </div>
            <div class="image">
              <img src="assets/img/signup/signup-1/signup-img.svg" alt="" class="w-100">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="signup-form-wrapper">
            <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="signup-form">
              <div class="single-input">
                <label for="signup-email">Username</label>
                <input type="text" id="signup-email" name="username" placeholder="Username">
              </div>
              <div class="single-input">
                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" name="password" placeholder="Enter password">
              </div>
              <div class="signup-button mb-25">
                <button type="submit" name="submit" class="button button-lg radius-10 btn-block">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ========================= signup-style-1 end ========================= -->

  <!-- ========================= JS here ========================= -->
  <script src="assets/js/bootstrap.5.0.0.alpha-2-min.js"></script>
  <script src="assets/js/tiny-slider.js"></script>
  <script src="assets/js/count-up.min.js"></script>
  <script src="assets/js/imagesloaded.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/glightbox.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/main.js"></script>
  <p class="text-center pb-30 pt-30">Contribute Here<a href="#"> GITHUB</a></p>
</body>
</html>
<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $userName = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM hods WHERE Username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $userName);

    // Execute query
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Check if a user was found and verify the password
    if ($user && $password === $user["Password"]) {
        $_SESSION["username"] = $userName;        
        header("Location: student_home.php");
        exit;
    } else {
        // Invalid username or password
        echo '<script>alert("Invalid username or password");</script>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
