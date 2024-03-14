<?php
session_start();
if (isset($_SESSION["hod_username"]) == false) {
  header("location:../index.php");
}

?>

<?php

include "../../db_connect.php";

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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- --------------------- -->

  <!-- --------------------- -->

  <!-- Custom styles for this template -->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    footer {
  text-align: center;
  padding: 5px;
  background-color: #abbaba;
  color: #000;
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
    <img class="img-profile m-2 rounded-circle" src="../<?php echo "$_SESSION[ProfilePhoto]" ?>" width="40" height="40">
  </div>
  <div class="sidebar-brand-text mx-2"> <?php echo $_SESSION["hod_Fullname"] ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link">
    <span>HOD - <?php echo $_SESSION["hod_department"] ?></span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link collapsed" href="../home.php">
    <i class="fas fa-fw fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
    <span>Dashboard</span>
  </a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
  Student
</div>


<li class="nav-item">
  <a class="nav-link collapsed" href="../add-student.php">
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
  <a class="nav-link" href="../addFaculty.php">
    <i class="fas fa-fw fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
    <span>Add Faculty</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="teacher.php">
    <i class="fas fa-fw fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
    <span>Teacher Complaints</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="../../logout.php">
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
                <img class="img-profile m-2 rounded-circle" src="../../images\logo.png">
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
                <a class="dropdown-item" href="add-teacher.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add teacher
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
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm smartReport"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Todays Student Complaints
                    <?php echo ' Date ' . date("Y-m-d") . '' ?>
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">

                    <?php

                    $username = $_SESSION["hod_username"];
                    $id = $_SESSION["hod_id"];

                    $todays_complaints = "SELECT * FROM complaints WHERE HODID = $id AND DATE(DateTime) = CURDATE()";

                    function  getTodaysComplaints($query)
                    {
                      include "../../db_connect.php";

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
            </div>
          </div>

          
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Students This Month Complaints</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Description</th>
                          <th>When</th>
                          <th>complaint</th>
                          <th>By Principal</th>
                          <th>BY Hod</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          
                          <th>Description</th>
                          <th>When</th>
                          <th>complaint</th>
                          <th>By Principal</th>
                          <th>BY Hod</th>
                          <th>View</th>
                        </tr>
                      </tfoot>
                      <tbody>

                        <?php
                        include "../../db_connect.php";

                        $id = $_SESSION["hod_id"];


                        // set date and time

                        $date = date("Y-m-d");
                        $dateElements = explode('-', $date);
                        $year = $dateElements[0];
                        $month = $dateElements[1];
                        $day = $dateElements[2];

                        // echo $month;    

                        $sql_data_display = "SELECT * FROM complaints WHERE MONTH(DateTime) = $month";

                        $result_data = $conn->query($sql_data_display);

                        if ($result_data->num_rows > 0) {
                          $i = 0;
                          // output data of each row  
                          while ($row = $result_data->fetch_assoc()) {
                            echo "<tr> 
                            
                                    <td> " . $row["ComplaintType"] . "</td> 
                                    <td> " . $row["DateTime"] . "</td> 

                                    <td> " . $row["Discription"] . "</td>
                                    
                                    <td> " . $row["ByAdmin"] . "</td> 

                                    <td>" . $row["ByHOD"] . "</td>
                                    <td>
                                      <button class='btn viewComplaintInTable' type='submit' id='$i'>
                                        <i class='fas fa-eye fa-2x text-gray-300 '></i>
                                      </button>
                                    </td>
                                    
                                    ";
                            $i = $i + 1;
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
    <?php include "../profile.php" ?>

  </div>
  <!-- End of Main Content -->


  </div>

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- smart report Modal start here -->
  <div class="modal fade" id="smartReportModal" tabindex="-1" role="dialog" aria-labelledby="smartReportModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="smartReportModal">Genrate Report</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">  
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="selectWho">Student/Teacher</label>
                <select id="selectWho" name="who" class="form-control" required>
                  <option value="" selected disabled>Student/Teacher</option>
                  <option value="student">Student</option>
                  <option value="teacher">Teacher</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
              
              <div class="form-group col-md-6">
                <label for="selectType">Select Complaint Type</label>
                <select id="selecteType" name="type" class="form-control" required>
                  <option value="" selected disabled>canteen/Staff</option>
                  <option value="Falculty">Falculty Related</option>
                  <option value="Raging">Raging</option>
                  <option value="SchoolBus">School Bus</option>
                  <option value="Office">Office Staff</option>
                  <option value="canteen">Canteen</option>
                  <option value="student">Student</option> 
                 <!-- Add more options as needed -->
                </select>
              </div>
            </div>  
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="student_enrollment">From</label>
                <input type="date" name="complaint-from" class="form-control" id="leavesFrom" placeholder="Select from date" required>
              </div>
              <div class="form-group col-md-6">
                <label for="leaves-to">To</label>
                <input type="date" name="complaint-to" class="form-control" id="leavesTo" placeholder="Select from date" required>
              </div>
          </div>
          </form>
          <section>
            <div class="container" id="reportDiv">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td id="aitLogo">
                      <img src="../../images\logo.png" height="100" width="100">
                    </td>
                    <td id="aitName">
                      <h2>Adarsh Institute Of Technology and Research Centre Vita</h2>
                      <h5 id="reportClass"></h5>
                    </td>
                  </tr>
                </tbody>
              </table>
              
              <!-- Card Body -->
              <div class="table-responsive">
                <table class="table table-bordered" id="reportTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>ComplaintType</th>
                      <th>Discription</th>
                      <th>DateTime</th>
                      <th>ByAdmin</th>
                      <th>ByHOD</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </section>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="close()">Close</button>
            <a class="btn btn-primary smartReportbtn">Search</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="printDiv('reportDiv')">Print</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- smart report form model end here -->


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
          <a class="btn btn-primary" href="../../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- view  complaint modal-->
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
                    <p class="mb-2 m-1 ">Principal</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="ByAdmin"></p>
                  </div>
                </div>
                <form action="process_complaint.php" method="post">
                  <input type="hidden" name="complaint_id" value="" id="complaint_id">
                  <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="Reviewed">Reviewed</button>
                        </td>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="Solved">Solved</button>
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
                      </div>
    <!-- ----------------------------------- -->

    
  <!-- view  complaint modal-->
  <div class="modal fade" id="complaintModalTeacher" tabindex="-1" role="dialog" aria-labelledby="complaintModal" aria-hidden="true">
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
                    <p class="text-muted mb-0" id="TeacherComplaintType"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="mb-0">Description</p>
                  </div>
                  <div class="col-sm-8">
                    <p class="text-muted mb-0" id="TeacherComplaintDescription"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-2 m-1 ">Principal</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="TeacherByAdmin"></p>
                  </div>
                </div>
                <form action="process_teacherComplaints.php" method="post">
                  <input type="hidden" name="complaint_id" value="" id="Teachercomplaint_id">
                  <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="Reviewed">Reviewed</button>
                        </td>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="Solved">Solved</button>
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
    </div>
                      
    <!-- ----------------------------------- -->

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

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
            document.getElementById("complaint_id").value = myObj[index].ComplaintID ;
            document.getElementById("ComplaintType").innerHTML = myObj[index].ComplaintType;
            document.getElementById("ComplaintDescription").innerHTML = myObj[index].Discription;
            document.getElementById("ByAdmin").innerHTML = myObj[index].ByAdmin;
          }
          xmlhttp.open("POST", "get_todaysComplaints.php");
          xmlhttp.send();
        });


        $('.viewComplaintInTable').on('click', function() {
          $('#complaintModal').modal('show');
          // alert(this.id);
          var index = this.id;

          const xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
            // console.log(myObj);
            
            document.getElementById("complaint_id").value = myObj[index].ComplaintID ;
            document.getElementById("ComplaintType").innerHTML = myObj[index].ComplaintType;
            document.getElementById("ComplaintDescription").innerHTML = myObj[index].Discription;
            document.getElementById("ByAdmin").innerHTML = myObj[index].ByAdmin;

          }
          xmlhttp.open("POST", "get_thisMonthComplaints.php");
          xmlhttp.send();
        });

      $(document).ready(function() {
        $('.viewProfile').on('click', function() {
          $('#profileModal').modal('show');
          // alert(this.id);
        });
      });

      
      $(document).ready(function() {
        $('.smartReport').on('click', function() {
          $('#smartReportModal').modal('show');
        });
      });

      $(document).ready(function() {
        $('.smartReportbtn').on('click', function() {

          var selectedWho = document.getElementById('selectWho').value;
          var selectedType = document.getElementById('selecteType').value;
          var selectedFrom = document.getElementById('leavesFrom').value;
          var selectedTo = document.getElementById('leavesTo').value;

          classInfo="<?php echo $_SESSION["hod_course"]?>"+" "+"<?php echo $_SESSION["hod_department"]?>";
          document.getElementById('reportClass').innerText =selectedWho +" "+selectedType+" "+"Complaint Report";

          // Create a FormData object to send data to the server
          const formData = new FormData();

          formData.append('complaint-from',selectedFrom);
          formData.append('complaint-to', selectedTo);
          formData.append('who', selectedWho);
          formData.append('type', selectedType);
          
          const xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
            console.log(myObj)

            if(myObj.length == 0 || myObj == " "){
              alert("No data found")
              // var tableBody = document.querySelector('#reportDiv').remove();

            }
            
              for (var i = 0; i < myObj.length; i++) {
                var tableBody = document.querySelector('#reportTable tbody');
                var row = tableBody.insertRow();

                var cell1 = row.insertCell(0).textContent = myObj[i].ComplaintType;
                var cell1 = row.insertCell(1).textContent = myObj[i].Discription;
                var cell3 = row.insertCell(2).textContent = myObj[i].DateTime;
                var cell4 = row.insertCell(3).textContent = myObj[i].ByAdmin;
                var cell5 = row.insertCell(4).textContent = myObj[i].ByHOD;
              }

          };

          xmlhttp.open("POST", "smartSearch.php");
          xmlhttp.send(formData);
        });

      });
    });
          // function to print report
    function printDiv(id) {
      var contentToPrint = document.getElementById(id).innerHTML;
      var originalContent = document.body.innerHTML;

      document.body.innerHTML = contentToPrint;

      window.print();

      // Restore the original document content
      document.body.innerHTML = originalContent;
    }

    </script>

</body>

</html>