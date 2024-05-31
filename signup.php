<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg" />

  <title>Add Student</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style type="text/css">
    /* Chart.js */
    @keyframes chartjs-render-animation {
      from {
        opacity: .99
      }

      to {
        opacity: 1
      }
    }

    .chartjs-render-monitor {
      animation: chartjs-render-animation 1ms
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
      position: absolute;
      direction: ltr;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      overflow: hidden;
      pointer-events: none;
      visibility: hidden;
      z-index: -1
    }

    .chartjs-size-monitor-expand>div {
      position: absolute;
      width: 1000000px;
      height: 1000000px;
      left: 0;
      top: 0
    }

    .chartjs-size-monitor-shrink>div {
      position: absolute;
      width: 200%;
      height: 200%;
      left: 0;
      top: 0
    }

    #profileHolder {
      width: 100px;
    }

    #aitName {
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile m-2 rounded-circle" src="images\logo.png">
                <span class="ml-2 d-none d-lg-inline text-gray-600 small">
                  We Make it happen - AITRC
                </span>

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item viewProfile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="add-student.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add Student
                </a>
                <a class="dropdown-item" href="addFaculty.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add Teacher
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->

            <div class="col-sm-4 col-sm-6">
              <div class="card shadow ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Register</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="modal-body">
                  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter first name"
                          required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="class">Class</label>
                        <select name="class" class="form-control" required>
                          <option value="" selected disabled>Select class</option>
                          <option value="FY">FY</option>
                          <option value="SY">SY</option>
                          <option value="TY">TY</option>
                          <option value="LY">Fourth year</option>
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="RollNo">Roll No</label>
                        <input type="number" name="roll_no" class="form-control" placeholder="Enter Roll No" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="course">Course</label>
                        <select name="course" class="form-control" required>
                          <option value="" selected disabled>Select Course</option>
                          <option value="Diploma">Diploma</option>
                          <option value="BE">BE</option>
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="department">Department</label>
                        <select name="department" class="form-control" required>
                          <option value="" selected disabled>Select department</option>
                          <option value="#">Computer</option>
                          <option value="#">TWO</option>
                          <option value="#">TWO</option>
                          <option value="#">Five</option>  
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="studentContactNo">Profile photo</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="studentContactNo">Student Contact No</label>
                        <input type="tel" name="student_mo" class="form-control" placeholder="Enter contact number"
                          required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="parentContactNo">Parent Contact No</label>
                        <input type="tel" name="parent_mo" class="form-control"
                          placeholder="Enter parent's contact number" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
            </div>

          <!-- Scroll to Top Button-->
          <a class="scroll-to-top rounded" style="display: none;">
            <i class="fas fa-angle-up"></i>
          </a>

          <!-- -----------------Modal End EDIT student form------------------------>
          <!-- Bootstrap core JavaScript-->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="js/sb-admin-2.min.js"></script>


          <script>
            $('#inputGroupFile01').on('change', function () {
              //get the file name
              var fileName = $(this).val();
              //replace the "Choose a file" label
              $(this).next('.custom-file-label').html(fileName);
            })


            if (window.history.replaceState) {
              window.history.replaceState(null, null, window.location.href);
            }
          </script>
</body>

</html>
<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Assuming your form has fields named accordingly

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $department = $_POST["department"];
    $class = $_POST["class"];
    $course = $_POST["course"];
    $student_mo = $_POST["student_mo"];
    $parent_mo = $_POST["parent_mo"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $roll_no = $_POST["roll_no"];

    function alert($message)
    {
        echo '<script>
    alert("' . $message . '");
    </script>';
    }

    // Validate first name
    $first_name = trim($_POST["first_name"]);
    if (empty($first_name)) {
        alert("First name is required.");
        exit;
    }

    // Validate last name
    $last_name = trim($_POST["last_name"]);
    if (empty($last_name)) {
        alert("Last name is required.");
        exit;
    }

    // Validate course
    $course = trim($_POST["course"]);
    if (empty($course)) {
        alert("Course is required.");
        exit;
    }

    // Validate class
    $class = trim($_POST["class"]);
    if (empty($class)) {
        alert("Class is required.");
        exit;
    }

    // Validate student contact number
    $student_mo = trim($_POST["student_mo"]);
    if (empty($student_mo) || !preg_match("/^\d{10}$/", $student_mo)) {
        alert("Invalid student contact number.");
        exit;
    }

    // Validate parent contact number
    $parent_mo = trim($_POST["parent_mo"]);
    if (empty($parent_mo) || !preg_match("/^\d{10}$/", $parent_mo)) {
        alert("Invalid parent contact number.");
        exit;
    }

    // Validate username
    $username = trim($_POST["username"]);
    if (empty($username) || !preg_match("/^\d{10}$/", $username)) {
        alert("Username must be a 10-digit number.");
        exit;
    }

    // Validate password (you may want to add more complex checks)
    $password = trim($_POST["password"]);
    if (empty($password)) {
        alert("Password is required.");
        exit;
    }

    // Handle image upload
    $targetDirectory = "profiles/students/"; // Change this to your desired upload directory
    $targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profile"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["profile"]["size"] > 50000000) {
        alert("Sorry, your file is too large.");
        $uploadOk = 0;
    }

    // Allow only certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        alert("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is OK, try to upload file
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
            alert("The file " . basename($_FILES["profile"]["name"]) . " has been uploaded.");
        } else {
            alert("Sorry, there was an error uploading your file.");
        }
    }

    // Continue with your existing code...

    // Use prepared statement to prevent SQL injection
    $stmt_insert_profile = $conn->prepare("INSERT INTO students_notc (FirstName, LastName, RollNo, Department, Class, StudentContactNo, ParentContactNo, Username, Password, ProfilePhoto, course) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt_insert_profile) {
        die("Error in preparing the statement: " . $conn->error);
    }

    // Bind parameters
    $stmt_insert_profile->bind_param("sssssssssss", $first_name, $last_name, $roll_no, $department, $class, $student_mo, $parent_mo, $username, $password, $targetFile, $course);

    // Execute the query
    if ($stmt_insert_profile->execute()) {
        echo '<script>alert("Successfully  Registered Now contact your HOD to confirm your idntity.")

    </script>';
    } else {
        die("Error: " . $stmt_insert_profile->error);
    }

    // Close the statement
    $stmt_insert_profile->close();
}

// delete student profile

?>