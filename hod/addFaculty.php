<?php
session_start();

if (isset($_SESSION["hod_username"]) == false) {
  header("location:home.php");
}

?>
<!DOCTYPE html>
<!-- saved from url=(0043)http://127.0.0.1:5501/student_dashbord.html -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg" />


  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add faculty</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- --------------------- -->

  <!-- --------------------- -->

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img class="img-profile m-2 rounded-circle" src="<?php echo "$_SESSION[ProfilePhoto]" ?>" width="40" height="40">
                </div>
                <div class="sidebar-brand-text mx-2"> <?php echo $_SESSION["hod_Fullname"]?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link">
                    <span>HOD - <?php echo $_SESSION["hod_department"]?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="home.php">
                    <i class="fas fa-fw fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Student
            </div>

        
            <li class="nav-item">
                <a class="nav-link collapsed" href="add-student.php">
                    <i class="fas fa-fw fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Add Student</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Teacher
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="addFaculty.php">
                    <i class="fas fa-fw fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Add Faculty</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
    <!-- End of Sidebar -->

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
              <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile m-2 rounded-circle" src="../images\logo.png">
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Faculty</h1>
            <!-- <a href="http://127.0.0.1:5501/student_dashbord.html#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 py-2 bg-light" style="border: none;">
                <button class="card-body btn btn-primary" data-toggle="modal" data-target="#addFacultyModel">
                  ADD NEW
                </button>
              </div>
            </div>
          </div>

          <!-- Content Row -->


          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Your Leaves</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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
                          <th>Profile</th>
                          <th>Name</th>
                          <th>Course</th>
                          <th>Department</th>
                          <th>Class</th>
                          <th>Position</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Profile</th>
                          <th>Name</th>
                          <th>Course</th>
                          <th>Department</th>
                          <th>Class</th>
                          <th>Position</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        include "../db_connect.php";
                        $hod_id = $_SESSION["hod_id"];
                        $hod_course = $_SESSION["hod_course"];
                        $hod_department = $_SESSION["hod_department"];

                        $sql_data_display = "SELECT * FROM teachers WHERE `course` = '$hod_course' AND `Department` = '$hod_department'";

                        $result_data = $conn->query($sql_data_display);

                        if ($result_data->num_rows > 0) {
                          $i = 0;
                          // output data of each row  
                          while ($row = $result_data->fetch_assoc()) {
                            $img = $row["ProfilePhoto"];
                            echo "<tr> 
                                          <td>
                                          <img src='$img' id='img$i' class='img-fluid rounded ' style='height:50px;width:50px'>
                                          </td> 
                                          <td>" . $row["LastName"] . "" . $row["LastName"] . " </td> 
                                          <td>" . $row["course"] . " </td> 

                                          <td> " . $row["Department"] . "</td> 

                                          <td> " . $row["Class"] . "</td>

                                          <td> " . $row["Position"] . "</td>

                                          <td> " . $row["Username"] . "</td> 
                                          
                                          <td>" . $row["Password"] . "</td>  
                                          <td>
                                            <button class='btn btn-success editbtn' id='$i'>
                                              <i class='fas fa-edit text-white-300' title='editbtn'></i>
                                            </button>
                                          </td>
                                          <td>
                                            <button class='btn btn-success deletebtn' id='$i'>
                                              <i class='fas fa-trash text-white-300' title='deletebtn' id='$i'></i>
                                            </button>
                                          </td>
                                        </tr>";
                                        $i = $i +1;
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

        <!-- Pie Chart -->

      </div>

      <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->


  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- -----------------Modal faculty  form---------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="addFacultyModel" tabindex="-1" role="dialog" aria-labelledby="addFacultyModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Faculty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" class="form-control" placeholder="Enter first name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" placeholder="Enter last name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="position">Position</label>
              <select name="position" class="form-control" required>
                <option value="" selected disabled>Select position</option>
                <option value="Class Teacher">Class Teacher</option>
                <option value="Lab Assistant">Lab Assistant</option>
                <option value="Helper">Helper</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="form-group">
              <label for="class">Class</label>
              <select name="class" class="form-control" required>
                <option value="" selected disabled>Select Class</option>
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
                  <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary" onclick="addFac()">Add Teacher</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- -----------------Modal End add faculty form---------------------- -->

  <!-- -----------------Modal Update faculty  form---------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="updateFacultyModel" tabindex="-1" role="dialog" aria-labelledby="updateFacultyModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Faculty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="update-teacher.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="hidden"  name="teacherID" class="form-control" id="teacherID" placeholder="teacherid" required>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter first name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Enter last name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="position">Position</label>
              <select id="position" name="position" class="form-control" required>
                <option value="" selected disabled>Select position</option>
                <option value="Class Teacher">Class Teacher</option>
                <option value="Lab Assistant">Lab Assistant</option>
                <option value="Helper">Helper</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="form-group">
              <label for="class">Class</label>
              <select id="class" name="class" class="form-control" required>
                <option value="" selected disabled>Select Class</option>
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
                  <input type="file" name="profile" class="custom-file-input" id="inputGroupFile08" aria-describedby="inputGroupFileAddon08">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary" onclick="addFac()">Update Teacher</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- -----------------Modal End update faculty form---------------------- -->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- delete teacher modal-->
  <div class="modal fade" id="deleteTeacher" tabindex="-1" role="dialog" aria-labelledby="deleteTeacher" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteTeacher">Delete Teacher</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this teacher?<span id="teacher_name"></span></div>
        <div class="modal-footer">
        <form action='delete_teacher.php' method='post'>
          <input type='hidden' name='teacherId' value='' id='teacherId'>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="submit">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <!-- delete teacher modal end-->

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>


  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="../js/demo/datatables-demo.js"></script> -->

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable({
          pageLength: 10,
          filter: true,
          deferRender: true,
          scrollCollapse: true,
      });

      $('.deletebtn').on('click', function() {
        var index = this.id;
        $('#deleteTeacher').modal('show');

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj);

          document.getElementById("teacherId").value = myObj[index].TeacherID;
          document.getElementById("teacher_name").innerHTML = myObj[index].FirstName + " "+myObj[index].LastName;
        }
        xmlhttp.open("POST", "getTeachers.php");
        xmlhttp.send();

      });
      
      $('.editbtn').on('click', function() {
        var index = this.id;
        console.log(this.id)
        $('#updateFacultyModel').modal('show');

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj);
          
          document.getElementById("teacherID").value = myObj[index].TeacherID;
          document.getElementById("firstName").value = myObj[index].FirstName;
          document.getElementById("lastName").value = myObj[index].LastName;
          document.getElementById("username").value = myObj[index].Username;
          document.getElementById("password").value = myObj[index].Password;
        }
        xmlhttp.open("POST", "getTeachers.php");
        xmlhttp.send();

      });

    });


    $('#inputGroupFile01').on('change', function() {
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

    $('#inputGroupFile08').on('change', function() {
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
include "../db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  // Assuming your form has fields named accordingly

  $first_name = $_POST["firstName"];
  $last_name = $_POST["lastName"];
  $course = $_SESSION["hod_course"];
  $department = $_SESSION["hod_department"];
  $class = $_POST["class"];
  $position = $_POST["position"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  


  function alert($message)
  {
    echo '<script>
    alert("' . $message . '");
    </script>';
  }

  // Validate first name
  $first_name = trim($_POST["firstName"]);
  if (empty($first_name)) {
    alert("First name is required.");
    exit;
  }

  // Validate last name
  $last_name = trim($_POST["lastName"]);
  if (empty($last_name)) {
    alert("Last name is required.");
    exit;
  }

  // Validate class
  $position = trim($_POST["position"]);
  if (empty($position)) {
    alert("Class is required.");
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
  $targetDirectory = "../profiles/teachers/"; // Change this to your desired upload directory
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
  $stmt_insert_profile = $conn->prepare("INSERT INTO teachers (FirstName, LastName, course, Class, Department, Position, Username, Password, ProfilePhoto) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("sssssssss", $first_name, $last_name, $course, $class, $department, $position, $username, $password, $targetFile);

  // Execute the query
  if ($stmt_insert_profile->execute()) {
    echo '<script>alert("Teacher Added.")
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