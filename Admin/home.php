<?php
session_start();
if (isset($_SESSION["admin_username"]) == false) {
  header("location:../index.php");
}

?>

<?php

include "../db_connect.php";

// echo $username;
$username = $_SESSION["admin_username"];
$sql_data_display = "SELECT * FROM `admin` WHERE `Username` = \"$username\";";

$result_data = $conn->query($sql_data_display);

if ($result_data->num_rows > 0) {

  // output data of each row  
  while ($row = $result_data->fetch_assoc()) {

    $_SESSION["ProfilePhoto"] = $row['ProfilePhoto'];
    $_SESSION["admin_id"] = $row['AdminID'];
    $_SESSION["admin_firstname"] = $row['FirstName'];
    $_SESSION["admin_lastname"] = $row['LastName'];
    $_SESSION["admin_username"] = $row['Username'];  // I know username already in session. 'ranjit'
    $_SESSION["admin_course"] = $row['course'];
  }
} else {
  echo "error or no results";
}

// echo $_SESSION["ProfilePhoto"];
// echo $_SESSION["admin_id"];
// echo $_SESSION["admin_lastname"];
// echo $_SESSION["ProfilePhoto"];
// echo $_SESSION["admin_username"];
// echo $_SESSION["admin_course"];


// Close the connection
$conn->close();

$admin_id = $_SESSION["admin_id"];
$admin_course = $_SESSION["admin_course"];
$admin_department = $_SESSION["admin_department"];



function getAllCount()
{

  $admin_id = $_SESSION["admin_id"];
  $admin_course = $_SESSION["admin_course"];
  $admin_department = $_SESSION["admin_department"];

  include "../db_connect.php";
  $result = $conn->query("SELECT COUNT(*) as count FROM students WHERE `course` = '$admin_course' AND `Department` = '$admin_department' ");
  if ($result) {
    $count = $result->fetch_assoc()['count'];
    return $count;
  } else {
    return $conn->error;
  }
}

// echo getAllCount();
function getCount($class)
{

  $admin_id = $_SESSION["admin_id"];
  $admin_course = $_SESSION["admin_course"];
  $admin_department = $_SESSION["admin_department"];

  include "../db_connect.php";
  $result = $conn->query("SELECT COUNT(*) as count FROM students WHERE `course` = '$admin_course' AND `Department` = '$admin_department' AND `Class` = '$class' ");
  if ($result) {
    $count = $result->fetch_assoc()['count'];
    return $count;
  } else {
    return $conn->error;
  }
}

// echo getCount("SY");
// echo getCount("FY");
// echo getCount("TY");

function countMonth($month)
{
  return "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = 1 AND MONTH(`DateTime`) = $month";
}

function countYear($year)
{
  return "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = 1 AND YEAR(`DateTime`) = $year";
}

// echo getCount(countMonth(1));
// echo getCount(countYear(2023));

// set date and time
$date = date("Y-m-d");
$day = date("l");
// echo $month = date('F', strtotime($date));

// $time = ;
// echo "Today is " . date("Y/m/d") . "<br>";
// echo "Today is " . date("Y.m.d") . "<br>";
// echo "Today is " . date("Y-m-d") . "<br>";
// echo "Today is " . date("l");



?>
<!DOCTYPE html>
<!-- saved from url=(0043)http://127.0.0.1:5501/student_dashbord.html -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.svg" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>admin Admin Panel</title>

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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile m-2 rounded-circle" src="<?php echo "$_SESSION[ProfilePhoto]" ?>">
                <span class="ml-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo $_SESSION["admin_firstname"] ?>
                </span>

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item viewProfile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
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
        <div class="container-fluid">

          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 py-2 bg-light" style="border: none;">
                <button class="card-body btn btn-primary" data-toggle="modal" data-target="#addHodModel">
                  ADD NEW
                </button>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $_SESSION["admin_course"] ?> HODS
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">

                    <?php

                    $username = $_SESSION["admin_username"];
                    $id = $_SESSION["admin_id"];
                    $admin_course = $_SESSION["admin_course"];

                    $get_hods = "SELECT * FROM hods WHERE course = '$admin_course'";

                    function  getTodaysLeaves($query)
                    {
                      include "../db_connect.php";

                      $username = $_SESSION["admin_username"];
                      $id = $_SESSION["admin_id"];

                      $sql_data_display = "$query";

                      $result_data = $conn->query($sql_data_display);

                      if ($result_data->num_rows > 0) {

                        $i = 0;

                        // output data of each row  
                        while ($row = $result_data->fetch_assoc()) {
                          echo '
                              <!-- Earnings (Monthly) Card Example -->
                              <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card  shadow h-100 py-2">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                        ' . $row["FirstName"] . $row["LastName"] .  '
                                        </div>
                                        <div class="mb-0 font-weight-bold text-gray-800">
                                           <span class="badge rounded-pill badge-success mt-1">' . $row["Department"] . '</span>

                                           <button class="btn editBtn" type="submit" id="' . $i . '">
                                              <i class="fas fa-edit fa-1x text-success-300"></i>
                                           </button>

                                           <button class="btn deleteBtn" type="submit" name="viewleave" id="' . $i . '">
                                              <i class="fas fa-trash fa-1x text-success-300"></i>
                                           </button>
                                        </div>
                                      </div>
                                      <div class="col-auto m-2">
                                        <button class="btn viewHOD" type="submit" name="viewHOD" id="' . $i . '">
                                          <i class="fas fa-eye fa-2x text-gray-300 "></i>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                          $i = $i + 1;
                        }
                      } else {
                        echo "error or no results";
                      }

                      // Close the connection
                      $conn->close();
                    }

                    getTodaysLeaves($get_hods);

                    ?>

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
  <?php include "profile.php" ?>

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
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
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- view  HOD modal-->

  <div class="modal fade" id="viewHOD" tabindex="-1" role="dialog" aria-labelledby="viewHOD" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModal">HOD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                <img src="#" class="rounded img-fluid" id="hodProfile" style="width: 100px; height:120px" />
              </div>
              <h4 class="mb-2" id="hodName"></h4>
              <p class="text-muted mb-4" id="hodDepartment"></p>
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Username</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0" id="username"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <p class="mb-0">Password</p>
                    </div>
                    <div class="col-sm-8">
                      <p class="text-muted mb-0" id="password"></p>
                    </div>
                  </div>
                  <input type="hidden" name="hod_id" value="" id="hodID">
                  <input type="hidden" name="leave_id" value="" id="leaveID">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- View hod modal end -->

  <!-- delete HOD modal-->
  <div class="modal fade" id="deleteHodModal" tabindex="-1" role="dialog" aria-labelledby="deleteHodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteHOD">Delete HOD</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this HOD?<span id="hod_name"></span></div>
        <div class="modal-footer">
        <form action='delete_hod.php' method='post'>
          <input type='hidden'  name='hodId' value='' id='hod_id'>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="submit">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <!-- delete HOD modal end-->

  <!-- -----------------Modal HOD ADD form---------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="addHodModel" tabindex="-1" role="dialog" aria-labelledby="addHodModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addHodModel">Add New HOD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="add-hod.php" method="post" enctype="multipart/form-data">
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
              <label for="department">Department</label>
              <select id="position" name="department" class="form-control" required>
                <option value="" selected disabled>Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Mechanical">Mechanical</option>
                <option value="AI">AI</option>
              </select>
            </div>
            <div class="form-group">
              <label for="studentContactNo">Profile photo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
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
            <button type="submit" name="submit" class="btn btn-primary" onclick="addFac()">Add HOD</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- -----------------Modal End add HOD form---------------------- -->

  <!-- -----------------Modal Update HOD  form---------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="updateHodModel" tabindex="-1" role="dialog" aria-labelledby="updateHodModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update HOD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="update-hod.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" name="hod_id" class="form-control" id="hod_id" placeholder="hod id" required>
                <input type="text" name="firstName" class="form-control" id="hod_firstname" placeholder="Enter first name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="hod_lastname" placeholder="Enter last name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="department">Department</label>
              <select id="position" name="department" class="form-control" required>
                <option value="" selected disabled>Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Mechanical">Mechanical</option>
                <option value="AI">AI</option>
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
              <input type="text" class="form-control" name="username" id="hod_username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="hod_password" placeholder="Enter password" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Update HOD</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- -----------------Modal End update faculty form---------------------- -->

  <?php include "profile.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

  <script>
    $('#inputGroupFile01').on('change', function() {
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
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
  <script>
    $(document).ready(function() {

      $('.viewHOD').on('click', function() {
        $('#viewHOD').modal('show');
        // alert(this.id);
        var index = this.id;

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj);

          document.getElementById("hodID").value = myObj[index].HODID;

          document.getElementById("hodID").value = myObj[index].HODID;
          document.getElementById("hodProfile").src = myObj[index].ProfilePhoto;
          document.getElementById("hodName").innerHTML = myObj[index].FirstName + " " + myObj[index].LastName;
          document.getElementById("hodDepartment").innerHTML = myObj[index].Department;

          document.getElementById("leaveID").value = myObj[index].LeaveID;
          document.getElementById("username").innerHTML = myObj[index].Username;
          document.getElementById("password").innerHTML = myObj[index].Password;
        }
        xmlhttp.open("POST", "get_hods.php");
        xmlhttp.send();
      });

      $('.editBtn').on('click', function() {
        $('#updateHodModel').modal('show');
        // alert(this.id);
        var index = this.id;

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj[index]);

          document.getElementById("hod_id").value = myObj[index].HODID;
          document.getElementById("hod_username").value = myObj[index].Username;
          document.getElementById("hod_password").value = myObj[index].Password;
          document.getElementById("hod_firstname").value = myObj[index].FirstName;
          document.getElementById("hod_lastname").value = myObj[index].LastName;

        }
        xmlhttp.open("POST", "get_hods.php");
        xmlhttp.send();
      });

      $('.deleteBtn').on('click', function() {
        $('#deleteHodModal').modal('show');
        // alert(this.id);
        var index = this.id;

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj[index].HODID);
          
          document.getElementById("hod_id").value = myObj[index].HODID;
          document.getElementById("hod_name").innerHTML = myObj[index].FirstName + " " + myObj[index].LastName;

        }
        xmlhttp.open("POST", "get_hods.php");
        xmlhttp.send();
      });


    });

    $(document).ready(function() {
      $('.addHodModel').on('click', function() {
        $('#addHodModel').modal('show');
        // alert(this.id);
      });
    });

    $(document).ready(function() {
      $('.viewProfile').on('click', function() {
        $('#profileModal').modal('show');
        // alert(this.id);
      });
    });
  
  </script>

</body>

</html>