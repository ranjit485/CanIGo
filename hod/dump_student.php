<?php
session_start();
if (isset($_SESSION["hod_username"]) == false) {
  header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.svg" />

  <title>Dump Student</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img class="img-profile m-2 rounded-circle" src="<?php echo "$_SESSION[ProfilePhoto]" ?>" width="40" height="40">
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
        

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-xl-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Not Confirmed students</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>img</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Last</th>
                          <th>Class</th>
                          <th>Roll No</th>
                          <th>Mobile No</th>
                          <th>Parent Mo </th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Add</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>img</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Last</th>
                          <th>Class</th>
                          <th>Roll No</th>
                          <th>Mobile No</th>
                          <th>Parent Mo </th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Add</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        include "../db_connect.php";
                        $hod_id = $_SESSION["hod_id"];
                        $hod_course = $_SESSION["hod_course"];
                        $hod_department = $_SESSION["hod_department"];

                        $sql_data_display = "SELECT * FROM Students_notc WHERE `course` = '$hod_course' AND `Department` = '$hod_department' ";

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
                                          <td>" . $row["StudentID"] . "</td> 
                                          <td>" . $row["FirstName"] . " </td> 
                                          <td>" . $row["LastName"] . " </td> 

                                          <td> " . $row["Class"] . "</td>

                                          <td> " . $row["RollNo"] . "</td>

                                          <td>" . $row["StudentContactNo"] . "</td>

                                          </td> 
                                          <td>" . $row["ParentContactNo"] . "</td>

                                          <td> " . $row["Username"] . "</td> 
                                          
                                          <td>" . $row["Password"] . "</td>  
                                          <td>
                                            <button class='btn btn-success dumpbtn' id='$i'>
                                              <i class='fas fa-plus text-white-300' title='Confirm student'></i>
                                            </button>
                                          </td>
                                          <td>
                                            <button class='btn btn-success deletebtn'  id='$i'>
                                              <i class='fas fa-trash text-white-300' title='delete'></i>
                                            </button>
                                          </td>                                   
                                        </tr>";
                                        $i = $i + 1;

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


  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" style="display: none;">
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

  <!-- delete student modal-->
  <div class="modal fade" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="deleteStudent" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteStudent">Delete Student</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this student?<span id="stu_name"></span></div>
        <div class="modal-footer">
          <form action='delete_student.php' method='post'>
            <input type='hidden' name='studentId' value='' id='studentId'>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="submit">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- delete student modal end-->

  <!-- -------------------- Logout Modal  START ----------------------------------------->
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
  <!-- -------------------- Logout Modal  START ----------------------------------------->
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


  <script>
    // table data handleing delete update report

    $(document).ready(function() {
      $('#dataTable').DataTable({
          pageLength: 10,
          filter: true,
          deferRender: true,
          scrollCollapse: true,
      });

      $('.deletebtn').on('click', function() {
        var index = this.id;
        alert(index)
        $('#deleteStudent').modal('show');

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const studentsObj = JSON.parse(this.responseText);
        
          // console.log(studentsObj);
          //   console.log(studentsObj[index].StudentID);
          //   console.log(studentsObj[index].FirstName);
          //   console.log(studentsObj[index].LastName);
        $('#studentId').val(studentsObj[index].StudentID);
        document.getElementById('stu_name').innerHTML = studentsObj[index].FirstName + " "+studentsObj[index].LastName;
        }
        xmlhttp.open("POST", "getStudents.php");
        xmlhttp.send();

      });
      
      $('.dumpbtn').on('click', function() {
        var index = this.id;
        console.log("Student index : "+ this.id)

        const xmlhttp = new XMLHttpRequest();  
      
        xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
              console.log(myObj[index]); 

            var forData = new FormData();

            l = myObj[index].FirstName;

            forData.append('firstName', l);
            forData.append('lastName', myObj[index].LastName);
            forData.append('rollNo', myObj[index].RollNo);
            forData.append('parentContactNo', myObj[index].ParentContactNo);
            forData.append('studentContactNo', myObj[index].StudentContactNo);
            forData.append('username', myObj[index].Username);
            forData.append('password', myObj[index].Password);
            forData.append('course', myObj[index].course);
            forData.append('department', myObj[index].Department);

            console.log(forData);
        }

        xmlhttp.open("POST", "getStudents.php");
        xmlhttp.send();

    
        const dump = new XMLHttpRequest();
        dump.open("POST", "confirm_student.php");
        dump.send(forData);
            

      });

    });
  </script>
</body>

</html>
