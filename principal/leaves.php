<?php
session_start();
if (isset($_SESSION["principal_username"]) == false) {
  header("location:../index.php");
}

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

  <title>Teacher Complaints</title>

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
      
        <div class="sidebar-brand-text mx-2"> AITRC</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link">
          <span>PRINCIPAl</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Complaints 
      </div>


      <li class="nav-item">
        <a class="nav-link collapsed" href="teacher-complaints.php">
          <i class="fas fa-fw fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Teacher Complaints</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="student-complaints.php">
          <i class="fas fa-fw fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Student Complaints</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Leaves
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="leaves.php">
          <i class="fas fa-fw fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>View Leaves</span></a>
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
                <!-- <a class="dropdown-item viewProfile">
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
                </a> -->
                <!-- <div class="dropdown-divider"></div> -->
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

<div class="row">
<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">This Month Leaves</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Course</th>
              <th>Dep</th>
              <th>Leave Type</th>
              <th>Reason</th>
              <th>When</th>
              <th>Start</th>
              <th>End</th>
              <th>BY Hod</th>
              <th>By Teacher</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Student Name</th>
              <th>Course</th>
              <th>Dep</th>
              <th>Leave Type</th>
              <th>Reason</th>
              <th>When</th>
              <th>Start</th>
              <th>End</th>
              <th>BY Teacher</th>
              <th>By HOD</th>
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

            $sql_data_display = "SELECT * FROM leaves INNER JOIN students ON leaves.StudentID = students.StudentID WHERE MONTH(leaves.DateTime) = $month";

            $result_data = $conn->query($sql_data_display);

            if ($result_data->num_rows > 0) {
              $i = 0;
              // output data of each row  
              while ($row = $result_data->fetch_assoc()) {
                echo "<tr> 
                        <td> " . $row["FirstName"] . " " . $row["LastName"] . "</td> 
                        <td> " . $row["course"] . "</td> 
                        <td> " . $row["Department"] . "</td> 
                        <td> " . $row["LeaveType"] . "</td> 

                        <td> " . $row["Reason"] . "</td>
                        
                        <td> " . $row["DateTime"] . "</td> 

                        <td>" . $row["StartDate"] . "</td>

                        <td>" . $row["EndDate"] . "</td>

                        <td>" . $row["HODApprovalStatus"] . "</td>

                        <td>" . $row["TeacherApprovalStatus"] . "</td>

                        
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
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->



  </div>

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

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
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- view eye complaint modal-->

  <div class="modal fade" id="viewComplaint" tabindex="-1" role="dialog" aria-labelledby="viewComplaint" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModal">Complaint</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">   
              <p class="text-muted mb-4" id="studentAbout"></p>
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">About</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0" id="about"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <p class="mb-0">Description</p>
                    </div>
                    <div class="col-sm-8">
                      <p class="text-muted mb-0" id="discription"></p>
                    </div>
                  </div>
                  <form action="process_teacher_complaint.php" method="post">
                  <input type="hidden" name="complaint_id" value="" id="complaintID">
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
  <!-- View complaint modal end -->
    <table id="example" class="display" width="100%"></table>
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
    $(document).ready(function() {

      $('.viewComplaint').on('click', function() {
        $('#viewComplaint').modal('show');
        // alert(this.id);
        var index = this.id;

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj);

          document.getElementById("complaintID").value = myObj[index].HODID;

          document.getElementById("about").innerHTML = myObj[index].ComplaintType;
          document.getElementById("discription").innerHTML = myObj[index].Discription;


          document.getElementById("complaintID").value = myObj[index].ComplaintID;
        }
        xmlhttp.open("POST", "get_todays_teacher_complaints.php");
        xmlhttp.send();
      });

      $('.viewComplaintInTable').on('click', function() {
        $('#viewComplaint').modal('show');
        // alert(this.id);
        var index = this.id;

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj);

          document.getElementById("complaintID").value = myObj[index].HODID;

          document.getElementById("about").innerHTML = myObj[index].ComplaintType;
          document.getElementById("discription").innerHTML = myObj[index].Discription;


          document.getElementById("complaintID").value = myObj[index].ComplaintID;
        }
        xmlhttp.open("POST", "get_this_month_teacher_complaint.php");
        xmlhttp.send();
      });

    });
  </script>
</body>
</html>