<?php
session_start();
if (isset($_SESSION["hod_username"]) == false) {
  header("location:../index.php");
}

?>

<?php

include "../db_connect.php";

// echo $username;
$username = $_SESSION["hod_username"];
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



function getAllCount()
{

  $hod_id = $_SESSION["hod_id"];
  $hod_course = $_SESSION["hod_course"];
  $hod_department = $_SESSION["hod_department"];

  include "../db_connect.php";
  $result = $conn->query("SELECT COUNT(*) as count FROM students WHERE `course` = '$hod_course' AND `Department` = '$hod_department' ");
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

  $hod_id = $_SESSION["hod_id"];
  $hod_course = $_SESSION["hod_course"];
  $hod_department = $_SESSION["hod_department"];

  include "../db_connect.php";
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

  <title>HOD Admin Panel</title>

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
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile m-2 rounded-circle" src="<?php echo "../$_SESSION[ProfilePhoto]" ?>">
                <span class="ml-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo $_SESSION["hod_firstname"] ?>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="http://127.0.0.1:5501/student_dashbord.html#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo getAllCount("SY") ?>
                      </div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo getCount("FY") ?>
                      </div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo getCount("SY") ?>
                      </div>
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
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php echo getCount("TY") ?>
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
                  <div class="chart-area">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
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
                  <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
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
                  <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
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

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Todays Leaves
                    <?php echo ' Date ' . date("Y-m-d") . '' ?>
                  </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Get Leaves</div>
                      <a class="dropdown-item" href="">All Leaves</a>
                      <a class="dropdown-item" href="">Pending Leaves</a>
                      <a class="dropdown-item" href="">Approved Leaves</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="http://127.0.0.1:5501/student_dashbord.html#">All Leaves </a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">

                    <?php

                    $username = $_SESSION["hod_username"];
                    $id = $_SESSION["hod_id"];

                    $todays_leaves = "SELECT * FROM leaves WHERE HODID = $id AND DATE(DateTime) = CURDATE()";
                    $approved_leaves = "SELECT * FROM leaves WHERE HODID = $id AND DATE(DateTime) = CURDATE()";
                    $pending_leaves = "SELECT * FROM leaves WHERE HODID = $id AND DATE(DateTime) = CURDATE()";
                    $all_leaves = "SELECT * FROM leaves WHERE HODID = $id";

                    function  getTodaysLeaves($query)
                    {
                      include "../db_connect.php";

                      $username = $_SESSION["hod_username"];
                      $id = $_SESSION["hod_id"];

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
                                        ' . $row["LeaveType"] . '
                                        </div>
                                        <div class="mb-0 font-weight-bold text-gray-800">
                                           <span class="badge rounded-pill badge-success mt-1">' . $row["HODApprovalStatus"] . '</span>
                                           <span class="badge rounded-pill badge-success">' . $row["TeacherApprovalStatus"] . '</span>
                                        </div>
                                      </div>
                                      <div class="col-auto m-2">
                                        <button class="btn viewLeave" type="submit" name="viewleave" id="' . $i . '">
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

                    getTodaysLeaves($todays_leaves);

                    ?>

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
                  <h6 class="m-0 font-weight-bold text-primary">This Month Leaves</h6>
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
                          <th>Student Name</th>
                          <th>Leave Type</th>
                          <th>Reason</th>
                          <th>When</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>BY Teacher</th>
                          <th>By HOD</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Student Name</th>
                          <th>Leave Type</th>
                          <th>Reason</th>
                          <th>When</th>
                          <th>Start</th>
                          <th>End</th>
                          <th>BY Teacher</th>
                          <th>By HOD</th>
                          <th>View</th>
                        </tr>
                      </tfoot>
                      <tbody>

                        <?php
                        include "../db_connect.php";

                        $id = $_SESSION["hod_id"];


                        // set date and time

                        $date = date("Y-m-d");
                        $dateElements = explode('-', $date);
                        $year = $dateElements[0];
                        $month = $dateElements[1];
                        $day = $dateElements[2];

                        // echo $month;    

                        $sql_data_display = "SELECT * FROM leaves INNER JOIN students ON leaves.StudentID = students.StudentID WHERE leaves.HODID = $id AND MONTH(leaves.DateTime) = $month";

                        $result_data = $conn->query($sql_data_display);

                        if ($result_data->num_rows > 0) {
                          $i=0;
                          // output data of each row  
                          while ($row = $result_data->fetch_assoc()) {
                            echo "<tr> 
                                    <td> " . $row["FirstName"] . " " . $row["LastName"] . "</td> 
                                    <td> " . $row["LeaveType"] . "</td> 

                                    <td> " . $row["Reason"] . "</td>
                                    
                                    <td> " . $row["DateTime"] . "</td> 

                                    <td>" . $row["StartDate"] . "</td>

                                    <td>" . $row["EndDate"] . "</td>

                                    <td>" . $row["HODApprovalStatus"] . "</td>

                                    <td>" . $row["TeacherApprovalStatus"] . "</td>
                                    <td>
                                      <button class='btn viewLeaveInTable' type='submit' name='viewleave' id='$i'>
                                        <i class='fas fa-eye fa-2x text-gray-300 '></i>
                                      </button>
                                    </td>
                                    
                                    ";
                                    $i=$i+1;
                          }
                        } else {
                          echo "error or no results";
                        }

                        // Close the connection
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
  <!-- view  leave modal-->
  <div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="leaveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModal">Leave</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                <img src="#" class="rounded img-fluid" id="studentProfile" style="width: 100px; height:120px" />
              </div>
              <h4 class="mb-2" id="studentName"></h4>
              <p class="text-muted mb-4" id="studentDepartment"></p>
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Type</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0" id="leaveType"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <p class="mb-0">Reson</p>
                    </div>
                    <div class="col-sm-8">
                      <p class="text-muted mb-0" id="leaveReson"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">From</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0" id="leaveStart"></p>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">To</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="leaveEnd"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0 m-2"> Teacher</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="teacherStatus"></p>
                  </div>
                </div>
                <form action="hod_approve.php" method="post">
                  <input type="hidden" name="student_id" value="" id="studentId">
                  <input type="hidden" name="leave_id" value="" id="leaveID">

                  <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="approve">Approve</button>
                        </td>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="reject">Reject</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ----------------------------------- -->
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
      $(document).ready(function() {
        
        $('.viewLeave').on('click', function() {
          $('#leaveModal').modal('show');
          // alert(this.id);
          var index = this.id;

          const xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
            console.log(myObj);
            // console.log(myObj[index].StudentID);
            // console.log(myObj[index].LeaveID);
            // console.log(myObj[index].LeaveType);
            // console.log(myObj[index].Reason);
            // console.log(myObj[index].StartDate);
            // console.log(myObj[index].EndDate);
            // console.log(myObj[index].TeacherApprovalStatus);
            // console.log(myObj[index].HODApprovalStatus);

            // console.log(myObj[index].ProfilePhoto);
            // console.log(myObj[index].LastName);
            // console.log(myObj[index].FirstName);
            // console.log(myObj[index].Class);
            // console.log(myObj[index].Department);

            document.getElementById("studentId").value = myObj[index].StudentID;
            document.getElementById("studentProfile").src = "../" + myObj[index].ProfilePhoto;
            document.getElementById("studentName").innerHTML = myObj[index].FirstName + " " + myObj[index].LastName;
            document.getElementById("studentDepartment").innerHTML = myObj[index].Class + " " + myObj[index].Department;

            document.getElementById("leaveID").value = myObj[index].LeaveID;
            document.getElementById("leaveType").innerHTML = myObj[index].LeaveType;
            document.getElementById("leaveReson").innerHTML = myObj[index].Reason;
            document.getElementById("leaveStart").innerHTML = myObj[index].StartDate;
            document.getElementById("leaveEnd").innerHTML = myObj[index].EndDate;
            document.getElementById("teacherStatus").innerHTML = myObj[index].TeacherApprovalStatus;
          }
          xmlhttp.open("POST", "todays_Leaves.php");
          xmlhttp.send();
        });

        $('.viewLeaveInTable').on('click', function() {
          $('#leaveModal').modal('show');
          // alert(this.id);
          var index = this.id;

          const xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
            // console.log(myObj);
            // console.log(myObj[index].StudentID);
            // console.log(myObj[index].LeaveID);
            // console.log(myObj[index].LeaveType);
            // console.log(myObj[index].Reason);
            // console.log(myObj[index].StartDate);
            // console.log(myObj[index].EndDate);
            // console.log(myObj[index].TeacherApprovalStatus);
            // console.log(myObj[index].HODApprovalStatus);

            // console.log(myObj[index].ProfilePhoto);
            // console.log(myObj[index].LastName);
            // console.log(myObj[index].FirstName);
            // console.log(myObj[index].Class);
            // console.log(myObj[index].Department);

            document.getElementById("studentId").value = myObj[index].StudentID;
            document.getElementById("studentProfile").src = "../" + myObj[index].ProfilePhoto;
            document.getElementById("studentName").innerHTML = myObj[index].FirstName + " " + myObj[index].LastName;
            document.getElementById("studentDepartment").innerHTML = myObj[index].Class + " " + myObj[index].Department;

            document.getElementById("leaveID").value = myObj[index].LeaveID;
            document.getElementById("leaveType").innerHTML = myObj[index].LeaveType;
            document.getElementById("leaveReson").innerHTML = myObj[index].Reason;
            document.getElementById("leaveStart").innerHTML = myObj[index].StartDate;
            document.getElementById("leaveEnd").innerHTML = myObj[index].EndDate;
            document.getElementById("teacherStatus").innerHTML = myObj[index].TeacherApprovalStatus;
          }
          xmlhttp.open("POST", "thisMonthLeaves.php");
          xmlhttp.send();
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