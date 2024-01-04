<?php
session_start();
if (isset($_SESSION["username"]) == false) {
  header("location:index.php");
}

?>

<?php

  include "db_connect.php";
  
// echo $username;
$username = $_SESSION["username"];
$sql_data_display = "SELECT * FROM `hods` WHERE `Username` = \"$username\";";

$result_data = $conn->query($sql_data_display);

if ($result_data->num_rows > 0) {

  // output data of each row  
  while ($row = $result_data->fetch_assoc()) {

    $_SESSION["ProfilePhoto"] = $row['ProfilePhoto'];
    $_SESSION["hod_id"] = $row['HODID'];
    $_SESSION["hod_firstname"] = $row['FirstName'];
    $_SESSION["hod_lastname"] = $row['LastName'];
    $_SESSION["hod_department"] = $row['Department'];
    $_SESSION["hod_username"] = $row['Username'];  // I know username already in session. 'ranjit'
    $_SESSION["hod_course"] = $row['course'];  

  }
} else {
  echo "error or no results";
}

// echo $_SESSION["ProfilePhoto"];
// echo $_SESSION["hod_id"];
// echo $_SESSION["hod_lastname"];
// echo $_SESSION["ProfilePhoto"];
// echo $_SESSION["hod_username"];
// echo $_SESSION["hod_course"];
// echo $_SESSION["hod_department"];


// Close the connection
$conn->close();

  $hod_id = $_SESSION["hod_id"];
  $hod_course = $_SESSION["hod_course"];
  $hod_department = $_SESSION["hod_department"];


  $all_student_count = "SELECT COUNT(*) as count FROM students WHERE `course` = '$hod_course' AND `Department` = '$hod_department' ";


  function getCount($class) {
    
  $hod_id = $_SESSION["hod_id"];
  $hod_course = $_SESSION["hod_course"];
  $hod_department = $_SESSION["hod_department"];

    include "db_connect.php";
    $result = $conn->query("SELECT COUNT(*) as count FROM students WHERE `course` = '$hod_course' AND `Department` = '$hod_department' AND `Class` = '$class' ");
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
 
  function countMonth($month){
    return "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = 1 AND MONTH(`DateTime`) = $month";
  }

  function countYear($year){
    return "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = 1 AND YEAR(`DateTime`) = $year";
  }

  // echo getCount(countMonth(1));
  // echo getCount(countYear(2023));

// set date and time
$date = date("Y-m-d");
$day = date("l");
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
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HOD Admin Panel</title>

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

    <!-- Sidebar -->
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
    <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="userDropdown"
      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img class="img-profile m-2 rounded-circle" src="<?php echo $_SESSION["ProfilePhoto"]?>">
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="http://127.0.0.1:5501/student_dashbord.html#"
              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        All students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">"90"</div>
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
                      FY students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getCount("FY") ?></div>
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
                      SY students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getCount("SY") ?></div>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TY students
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo getCount("TY") ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myAreaChart" width="1404" height="640" style="display: block; width: 702px; height: 320px;" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myPieChart" width="636" height="490" style="display: block; width: 318px; height: 245px;" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direct
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Referral
                </span>
            </div>
        </div>
    </div>
</div>
          </div>


          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Your Leaves</h6>
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
                          <th>Student Name</th>
                          <th>Leave Type</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>Reason</th>
                          <th>BY Teacher</th>
                          <th>By HOD</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Student Name</th>
                          <th>Leave Type</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>Reason</th>
                          <th>BY Teacher</th>
                          <th>By HOD</th>
                          <th>View</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>Sonali Deshmukh</td>
                          <td>Sick Leave</td>
                          <td>2023-01-10</td>
                          <td>2023-01-15</td>
                          <td>Preparing for exams</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>
                            <button class="btn btn-success"><i class="fas fa-eye text-white-300"
                                title="View"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td>Akshay Kulkarni</td>
                          <td>Emergency Leave</td>
                          <td>2023-02-15</td>
                          <td>2023-02-18</td>
                          <td>Due to any unforeseen circumstances</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>
                            <button class="btn btn-success"><i class="fas fa-eye text-white-300"
                                title="View"></i></button>
                          </td>
                        </tr>
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
  <a class="scroll-to-top rounded" href="http://127.0.0.1:5501/student_dashbord.html#page-top" style="display: none;">
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

  <!-- -----------------Modal Start Leave form---------------------- -->


  <!-- Modal -->
  <div class="modal fade" id="leaveFormModel" tabindex="-1" role="dialog" aria-labelledby="leaveFormModel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Leave Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="datetime-local" class="form-control form-control-user" id="exampleFirstName"
                  placeholder="First Name">
              </div>
              <div class="col-sm-6">
                <input type="datetime-local" class="form-control form-control-user" id="exampleLastName"
                  placeholder="Last Name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-3">
                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                  placeholder="Password">
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                  placeholder="Repeat Password">
              </div>
            </div>
            <textarea type="text" class="form-control form-control-user" id="exampleLastName"
              placeholder="Last Name"></textarea>
          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- -----------------Modal End Leave form---------------------- -->



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
</body>

</html>