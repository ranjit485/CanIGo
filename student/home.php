<?php
session_start();
if (isset($_SESSION["student_username"]) == false) {
  header("location:../index.php");
}


include "../db_connect.php";

// echo $username;
$username = $_SESSION["student_username"];
$sql_data_display = "SELECT * FROM `students` WHERE `Username` = \"$username\";";

$result_data = $conn->query($sql_data_display);

if ($result_data->num_rows > 0) {

  // output data of each row  
  while ($row = $result_data->fetch_assoc()) {

    $_SESSION["ProfilePhoto"] = $row['ProfilePhoto'];
    $_SESSION["student_id"] = $row['StudentID'];
    $_SESSION['student_firstname'] = $row['FirstName'];
    $_SESSION['student_lastname'] = $row['LastName'];
    $_SESSION['student_course'] = $row['course'];
    $_SESSION['student_department'] = $row['Department'];
    $_SESSION['student_class'] = $row['Class'];
    $_SESSION['student_mo'] = $row['StudentContactNo'];
    $_SESSION['parent_mo'] = $row['ParentContactNo'];
    $_SESSION['student_username'] = $row['Username'];     // I know username already in session. 'ranjit'

  }
} else {
  echo "error or no results";
}


$id = $_SESSION["student_id"];
$student_department = $_SESSION["student_department"];
$student_course = $_SESSION["student_course"];
$student_class = $_SESSION['student_class'];


$hod_data_display = "SELECT * FROM `hods` WHERE `course` = '$student_course' AND `Department` = '$student_department'";

$result_data = $conn->query($hod_data_display);

if ($result_data->num_rows > 0) {

  // output data of each row  
  while ($row = $result_data->fetch_assoc()) {

    $_SESSION["hod_id"] = $row['HODID'];
    $_SESSION["hod_firstname"] = $row['FirstName'];
    $_SESSION["hod_lastname"] = $row['LastName'];

  }
} else {
  echo "error or no results for hod";
}


$teacher_data_display = "SELECT * FROM `teachers` WHERE `course` = '$student_course' AND `Department` = '$student_department' AND `Class` = '$student_class'";

$result_data = $conn->query($teacher_data_display);

if ($result_data->num_rows > 0) {

  // output data of each row  
  while ($row = $result_data->fetch_assoc()) {

    $_SESSION["teacher_id"] = $row['TeacherID'];
    $_SESSION["teacher_firstname"] = $row['FirstName'];
    $_SESSION["teacher_lastname"] = $row['LastName'];
    $_SESSION["teacher_class"] = $row['LastName'];

  }
} else {
  echo "error or no results for Teacher";
}

//  Retrieve the count of all Approved leaves for a specific student:
$approved_leave_count = "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = $id AND (`TeacherApprovalStatus` = 'Approved' OR `HODApprovalStatus` = 'Approved')";

$pending_leave_count = "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = $id AND (`TeacherApprovalStatus` = 'pending' OR `HODApprovalStatus` = 'pending')";

//  Retrieve the count of all  leaves for a specific student:
$all_leave_count = "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = $id";

function getCount($query)
{
  include "../db_connect.php";
  $result = $conn->query($query);
  if ($result) {
    $count = $result->fetch_assoc()['count'];
    return $count;
  } else {
    return $conn->error;
  }
}

function countMonth($month)
{
  $id = $_SESSION["student_id"];
  return "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = $id AND MONTH(`DateTime`) = $month";
}

function countYear($year)
{
  $id = $_SESSION["student_id"];
  return "SELECT COUNT(*) as count FROM leaves WHERE `StudentID` = $id AND YEAR(`DateTime`) = $year";
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


  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student Dashboard</title>

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

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="http://127.0.0.1:5501/student_dashbord.html#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="http://127.0.0.1:5501/student_dashbord.html#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="http://127.0.0.1:5501/student_dashbord.html#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="http://127.0.0.1:5501/student_dashbord.html#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="http://127.0.0.1:5501/student_dashbord.html#">

                  <a class="dropdown-item d-flex align-items-center" href="http://127.0.0.1:5501/student_dashbord.html#">
                    <div class="dropdown-list-image mr-3">
                      <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                      <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                      <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                        told me that people say this to all dogs, even if they aren't good...</div>
                      <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="http://127.0.0.1:5501/student_dashbord.html#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="http://127.0.0.1:5501/student_dashbord.html#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php
                  echo $_SESSION["student_firstname"]; // Check the username specifically

                  ?>
                </span>
                <img class="img-profile rounded-circle" src="../<?php echo $_SESSION["ProfilePhoto"] ?>" /> 
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" data-toggle="modal" data-target="#profileModal">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="http://127.0.0.1:5501/student_dashbord.html#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="http://127.0.0.1:5501/student_dashbord.html#">
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
                        Total Leaves</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getCount($all_leave_count) ?></div>
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
                        Approved</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getCount($approved_leave_count) ?></div>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo getCount($pending_leave_count) ?></div>
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
              <div class="card h-100 py-2 bg-light" style="border: none;">
                <button class="card-body btn btn-primary" data-toggle="modal" data-target="#leaveFormModel">
                  Request New Leave
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
                  <h6 class="m-0 font-weight-bold text-primary">Year Graph</h6>
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
                        here </a>
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
                    <canvas id="myAreaChart" width="1269" height="320" style="display: block; height: 320px; width: 1269px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>

          <!-- Content Row -->

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Todays Leaves <?php echo ' Date ' . date("Y-m-d") . '' ?></h6>
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

                    $todays_leaves = "SELECT * FROM leaves WHERE StudentID = $id AND DATE(DateTime) = CURDATE()";
                    $approved_leaves = "SELECT * FROM leaves WHERE StudentID = $id AND DATE(DateTime) = CURDATE()";
                    $pending_leaves = "SELECT * FROM leaves WHERE StudentID = $id AND DATE(DateTime) = CURDATE()";
                    $all_leaves = "SELECT * FROM leaves WHERE StudentID = $id";

                    function  getTodaysLeaves($query)
                    {
                      include "../db_connect.php";

                      $id = $_SESSION["student_id"];
                      $username = $_SESSION["student_username"];

                      // echo $student_id;


                      // $sql_data_display = "SELECT * FROM leaves WHERE StudentID = $student_id AND DATE(DateTime) = $date" ;
                      $sql_data_display = "$query";

                      $result_data = $conn->query($sql_data_display);

                      if ($result_data->num_rows > 0) {

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
                                           <span class="badge rounded-pill badge-success mt-1">H ' . $row["HODApprovalStatus"] . '</span>
                                           <span class="badge rounded-pill badge-success">T ' . $row["TeacherApprovalStatus"] . '</span>
                                        </div>
                                      </div>
                                      <div class="col-auto m-2">
                                        <i class="fas fa-eye fa-2x text-gray-300"></i>
                                     </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
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
                          <th>Leave Type</th>
                          <th>Reson</th>
                          <th>When</th>
                          <th>From</th>
                          <th>To</th>
                          <th>By HOD</th>
                          <th>By Teacher</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Leave Type</th>
                          <th>Reson</th>
                          <th>When</th>
                          <th>From</th>
                          <th>To</th>
                          <th>By HOD</th>
                          <th>By Teacher</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        include "../db_connect.php";

                        $username = $_SESSION["student_username"];
                        $id = $_SESSION["student_id"];


                        //Retrieve all leaves for a specific student:
                        $sql_data_display = "SELECT * FROM Leaves WHERE StudentID = $id";

                        $result_data = $conn->query($sql_data_display);

                        if ($result_data->num_rows > 0) {

                          // output data of each row  
                          while ($row = $result_data->fetch_assoc()) {
                            echo "<tr> 
                                    <td> " . $row["LeaveType"] . "</td> 

                                    <td> " . $row["Reason"] . "</td>
                                    
                                    <td> " . $row["DateTime"] . "</td> 

                                    <td>" . $row["StartDate"] . "</td>

                                    <td>" . $row["EndDate"] . "</td>

                                    <td>" . $row["HODApprovalStatus"] . "</td>

                                    <td>" . $row["TeacherApprovalStatus"] . "</td>
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
  <?php include "leave_form.php" ?>
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

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
  <?php include "leave_chart.php" ?>

</body>

</html>