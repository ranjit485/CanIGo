<?php
session_start();
if (isset($_SESSION["teacher_username"]) == false) {
  header("location:../index.php");
}

?>

<?php

include "../db_connect.php";

// echo $username;
$teacher_username = $_SESSION["teacher_username"];
$sql_data_display = "SELECT * FROM `teachers` WHERE `Username` = \"$teacher_username\";";

$result_data = $conn->query($sql_data_display);

if ($result_data->num_rows > 0) {

  // output data of each row  
  while ($row = $result_data->fetch_assoc()) {

    $_SESSION["ProfilePhoto"] = $row['ProfilePhoto'];
    $_SESSION["teacher_id"] = $row['TeacherID'];
    $_SESSION["teacher_firstname"] = $row['FirstName'];
    $_SESSION["teacher_lastname"] = $row['LastName'];
    $_SESSION["teacher_department"] = $row['Department'];
    $_SESSION["teacher_class"] = $row['Class'];
    $_SESSION["teacher_username"] = $row['Username'];  // I know username already in session. 'ranjit'
    $_SESSION["teacher_course"] = $row['course'];
  }
} else {
  echo "error or no results";
}

// Close the connection
$conn->close();

$teacher_id = $_SESSION["teacher_id"];
$teacher_course = $_SESSION["teacher_course"];
$teacher_department = $_SESSION["teacher_department"];


  //  Retrieve the count of all  leaves for a specific student:
  $all_complaint_count = "SELECT COUNT(*) as count FROM teacher_complaints WHERE `TeacherID` = $teacher_id";
  
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

  <title>Home</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../credits.css" rel="stylesheet">
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
          <img class="img-profile m-2 rounded-circle" src="<?php echo " $_SESSION[ProfilePhoto]" ?>" width="40"
          height="40">
        </div>
        <div class="sidebar-brand-text mx-2">
          <?php echo $_SESSION["teacher_firstname"]," ",$_SESSION["teacher_lastname"] ?>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link">
          <span>
            <?php echo $_SESSION["teacher_class"] ," ",$_SESSION["teacher_department"] ?>
          </span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <li class="nav-item">
        <a class="nav-link collapsed" href="home.php">
          <i class="fas fa-fw fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Dashboard</span>
        </a>
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
              <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile m-2 rounded-circle" src="../images\logo.png">
                <span class="ml-2 d-none d-lg-inline text-gray-600 small">
                  <div id="credits" class="team-member m-0 font-weight-bold text-primary"></div>
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>



          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 py-2 bg-light" style="border: none;">
                <button class="card-body btn btn-primary" data-toggle="modal" data-target="#complaintFormModel">
                  Add New Complaint
                </button>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Todays Complaint
                    <?php echo ' Date ' . date("Y-m-d") . '' ?>
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
                    <?php
                        $id = $_SESSION["teacher_id"];

                        $todays_complaints = "SELECT * FROM Teacher_complaints WHERE TeacherID = $id AND DATE(DateTime) = CURDATE()";
                        $all_complaints = "SELECT * FROM leaves WHERE id = $id";

                        function  getTodaysComplaints($query)
                        {
                          include "../db_connect.php";

                          $id = $_SESSION["teacher_id"];
                          $username = $_SESSION["teacher_username"];

                          // echo $teacher_id;


                          // $sql_data_display = "SELECT * FROM leaves WHERE teacherID = $teacher_id AND DATE(DateTime) = $date" ;
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
                                            ' . $row["ComplaintType"] . '
                                            </div>
                                            <div class="mb-0 font-weight-bold text-gray-800">
                                              <span class="badge rounded-pill badge-success mt-1">H ' . $row["ByHOD"] . '</span>
                                              <span class="badge rounded-pill badge-success">P ' . $row["ByAdmin"] . '</span>
                                            </div>
                                          </div>
                                          <div class="col-auto m-2">
                                          <button class="btn viewComplaint" type="submit" name="viewleave" id="' . $i . '">
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

                        getTodaysComplaints($todays_complaints);
                    ?>

                  </div>
                </div>
              </div>
              <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                  <div class="card shadow mb-4 ">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">This Month Complaints</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>About</th>
                              <th>Description</th>
                              <th>When</th>
                              <th>By Admin</th>
                              <th>By HOD</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>About</th>
                              <th>Description</th>
                              <th>When</th>
                              <th>By Admin</th>
                              <th>By HOD</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php
                                include "../db_connect.php";

                                $username = $_SESSION["teacher_username"];
                                $id = $_SESSION["teacher_id"];


                                //Retrieve all Complaints for a specific teacher:
                                $sql_data_display = "SELECT * FROM teacher_complaints WHERE TeacherID = $id";

                                $result_data = $conn->query($sql_data_display);

                                if ($result_data->num_rows > 0) {

                                  // output data of each row  
                                  while ($row = $result_data->fetch_assoc()) {
                                    echo "<tr> 
                                            <td> " . $row["ComplaintType"] . "</td> 

                                            <td> " . $row["Discription"] . "</td>
                                            
                                            <td> " . $row["DateTime"] . "</td> 

                                            <td>" . $row["ByHOD"] . "</td>

                                            <td>" . $row["ByAdmin"] . "</td>                                       
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

              <!-- Pie Chart -->

            </div>

            <!-- Content Row -->

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


      </div>
      <!-- End of Content Wrapper -->
      <?php include "profile.php" ?>
    </div>
    <!-- End of Page Wrapper -->
    <!-- view  Complaint modal-->
    <div class="modal fade" id="complaintModal" tabindex="-1" role="dialog" aria-labelledby="complaintModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModal">Complaints</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body text-center">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Type</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="ComplaintType"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Description</p>
                  </div>
                  <div class="col-sm-8">
                    <p class="text-muted mb-0" id="ComplaintDescription"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-2 m-1  ">Principal</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="ByAdmin"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-2 m-1  ">HOD</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="ByHOD"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- view complaint end -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
      <i class="fas fa-angle-up"></i>
    </a>
    <?php include "complaint_form.php" ?>

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
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
      <?php include "profile.php" ?>

      <!-- ----------------------------------- -->
      <!-- Bootstrap core JavaScript-->
      <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="../js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="../vendor/chart.js/Chart.min.js"></script>
      <script src="../credits.js"></script>

      <!-- Page level plugins -->
      <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="../js/demo/datatables-demo.js"></script>
      <script src="../credits.js"></script>

      <script>
      $(document).ready(function() {

        $('.viewComplaint').on('click', function() {
          $('#complaintModal').modal('show');
          // alert(this.id);
          var index = this.id;

          const xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
            console.log(myObj);


            document.getElementById("ComplaintType").innerHTML = myObj[index].ComplaintType;
            document.getElementById("ComplaintDescription").innerHTML = myObj[index].Discription;
            document.getElementById("ByAdmin").innerHTML = myObj[index].ByAdmin;
            document.getElementById("ByHOD").innerHTML = myObj[index].ByHOD;
          }
          xmlhttp.open("POST", "get_todaysComplaints.php");
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