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
  <!-- --------------------- -->

  <!-- --------------------- -->

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
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="userDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile m-2 rounded-circle" src="./Student Dashboard-2_files/undraw_profile.svg">
                <span class="ml-2 d-none d-lg-inline text-gray-600 small">ranjit</span>

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="student_dashbord.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="student_dashbord.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="student_dashbord.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
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
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        First Year</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Second Year</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Third Year
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 py-2 bg-light" style="border:none">
                <button class="card-body btn btn-primary" data-toggle="modal" data-target="#addFacultyModel">
                  ADD NEW
                </button>
              </div>
            </div>
          </div>


          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All students</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" role="button"
                      id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="http://127.0.0.1:5501/student_dashbord.html#">Action</a>
                      <a class="dropdown-item" href="http://127.0.0.1:5501/student_dashbord.html#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="http://127.0.0.1:5501/student_dashbord.html#">Something else
                        here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>img</th>
                          <th>StudentID</th>
                          <th>Name</th>
                          <th>Department</th>
                          <th>Class</th>
                          <th>Mobail No</th>
                          <th>Parent Mo </th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>img</th>
                          <th>StudentID</th>
                          <th>Name</th>
                          <th>Department</th>
                          <th>Class</th>
                          <th>Mobail No</th>
                          <th>Parent Mo </th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        include "db_connect.php";

                        $sql_data_display = "SELECT * FROM Students";

                        $result_data = $conn->query($sql_data_display);

                        if ($result_data->num_rows > 0) {

                          // output data of each row  
                          while ($row = $result_data->fetch_assoc()) {
                            $img =$row["ProfilePhoto"];
                            echo "<tr> 
                                          <td>
                                          <img src='$img' class='img-fluid rounded ' style='height:50px;width:50px'>
                                          </td> 
                                          <td>" . $row["StudentID"] . "</td> 

                                          <td>" . $row["FirstName"] . " " . $row["LastName"] . " </td> 

                                          <td> " . $row["Department"] . "</td> 

                                          <td> " . $row["Class"] . "</td>

                                          <td>" . $row["StudentContactNo"] . "</td>

                                          </td> 
                                          <td>" . $row["ParentContactNo"] . "</td>

                                          <td> " . $row["Username"] . "</td> 
                                          
                                          <td>" . $row["Password"] . "</td>  
                                          <td>
                                            <button class='btn btn-success'>
                                              <i class='fas fa-edit text-white-300' title='Approve'></i>
                                            </button>
                                        
                                            <button class='btn btn-success'>
                                              <i class='fas fa-trash text-white-300' title='Approve'></i>
                                            </button>
                                          </td>                                          
                                        </tr>";
                          }
                        } else {
                          echo "error or no results";
                        }
                        $conn->close();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © can I GO 2023</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="http://127.0.0.1:5501/login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- -----------------Modal Start add student form---------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="addFacultyModel" tabindex="-1" role="dialog" aria-labelledby="addFacultyModel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter first name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Enter last name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="department">Department</label>
              <select id="department" name="department" class="form-control" required>
                <option value="" selected disabled>Select department</option>
                <option value="Computer Science">Computer Engineering</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="AI Engineering">AI Engineering</option>
                <option value="Eletronic Engineering">Eletronic Engineering</option>
                <option value="Computer Diploma">Computer Diploma</option>
                <option value="Electrical Diploma">Electrical Diploma</option>
                <option value="Mechanical Diploma">Mechanical Diploma</option>
                <option value="AI Diploma">AI Diploma</option>
                <option value="Mechanical Diploma">Eletronic Diploma</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="form-group">
              <label for="class">Class</label>
              <select id="class" name="class" class="form-control" required>
                <option value="" selected disabled>Select class</option>
                <option value="FY">FY</option>
                <option value="SY">SY</option>
                <option value="TY">TY</option>
                <!-- Add more options as needed -->
              </select>
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
                <input type="tel" name="student_mo" class="form-control" id="studentContactNo" placeholder="Enter contact number" required>
              </div>
              <div class="form-group col-md-6">
                <label for="parentContactNo">Parent Contact No</label>
                <input type="tel" name="parent_mo" class="form-control" id="parentContactNo" placeholder="Enter parent's contact number"
                  required>
              </div>  
            </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
              </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- -----------------Modal End add student form---------------------- -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  
  <script>
            $('#inputGroupFile01').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
            
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
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
  $student_mo = $_POST["student_mo"];
  $parent_mo = $_POST["parent_mo"];
  $username = $_POST["username"];
  $password = $_POST["password"];


  function alert($message) {
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

  // Validate department
  $department = trim($_POST["department"]);
  if (empty($department)) {
    alert("Department is required.");
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
  $targetDirectory = "students\profile"; // Change this to your desired upload directory
  $targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if the image file is a actual image or fake image
  if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["profile"]["tmp_name"]);
      if ($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }

  // Check file size
  if ($_FILES["profile"]["size"] > 500000) {
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
  $stmt_insert_profile = $conn->prepare("INSERT INTO students (FirstName, LastName, Department, Class, StudentContactNo, ParentContactNo, Username, Password, ProfilePhoto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

  if (!$stmt_insert_profile) {
      die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("sssssssss", $first_name, $last_name, $department, $class, $student_mo, $parent_mo, $username, $password, $targetFile);

  // Execute the query
  if ($stmt_insert_profile->execute()) {
      echo '<script>alert("Student Added.")
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
      </script>';
  } else {
      die("Error: " . $stmt_insert_profile->error);
  }

  // Close the statement
  $stmt_insert_profile->close();
}
?>