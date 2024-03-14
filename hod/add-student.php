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

  <title>Add Student</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
          <!-- Content Row -->
          <div class="row">

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
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Report</th>
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
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Report</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        include "../db_connect.php";
                        $hod_id = $_SESSION["hod_id"];
                        $hod_course = $_SESSION["hod_course"];
                        $hod_department = $_SESSION["hod_department"];

                        $sql_data_display = "SELECT * FROM Students WHERE `course` = '$hod_course' AND `Department` = '$hod_department' ";

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
                                            <button class='btn btn-success editbtn' id='$i'>
                                              <i class='fas fa-edit text-white-300' title='edit'></i>
                                            </button>
                                          </td>
                                          <td>
                                            <button class='btn btn-success deletebtn'  id='$i'>
                                              <i class='fas fa-trash text-white-300' title='delete'></i>
                                            </button>
                                          </td> 
                                          <td>
                                            <button class='btn btn-success genrateReport' id='$i'>
                                              <i class='fas fa-chart-bar text-white-300' title='Genrate Report'></i>
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

  <!-- -----------------Modal Start add student form---------------------- -->

  <div class="modal fade" id="addFacultyModel" tabindex="-1" role="dialog" aria-labelledby="addFacultyModel" aria-hidden="true">
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
                <input type="text" name="first_name" class="form-control" placeholder="Enter first name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="class">Class</label>
                <select name="class" class="form-control" required>
                  <option value="" selected disabled>Select class</option>
                  <option value="FY">FY</option>
                  <option value="SY">SY</option>
                  <option value="TY">TY</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="RollNo">Roll No</label>
                <input type="number" name="roll_no" class="form-control" placeholder="Enter Roll No" required>
              </div>
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
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="studentContactNo">Student Contact No</label>
                <input type="tel" name="student_mo" class="form-control" placeholder="Enter contact number" required>
              </div>
              <div class="form-group col-md-6">
                <label for="parentContactNo">Parent Contact No</label>
                <input type="tel" name="parent_mo" class="form-control" placeholder="Enter parent's contact number" required>
              </div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter password" required>
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

  <!-- -----------------Modal Start EDIT student form---------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="updateStudentModal" tabindex="-1" role="dialog" aria-labelledby="addFacultyModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update_student.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="student_id" class="form-control" id="student_id">
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
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="class">Class</label>
                <select id="class" name="class" class="form-control" required>
                  <option value="" selected disabled>Select class</option>
                  <option value="FY">FY</option>
                  <option value="SY">SY</option>
                  <option value="TY">TY</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="RollNo">Roll No</label>
                <input type="text" name="roll_no" class="form-control" id="rollNo" placeholder="Enter Roll No" required>
              </div>
            </div>
            <div class="form-group">
              <label for="studentContactNo">Profile photo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="profile" class="custom-file-input" id="inputGroupFile06" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile06">Choose file</label>
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
                <input type="tel" name="parent_mo" class="form-control" id="parentContactNo" placeholder="Enter parent's contact number" required>
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
          <button type="submit" name="edit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- -----------------Modal End EDIT student form------------------------>

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

  <!-- -------------------- Report Modal  START ----------------------------------------->
  <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Genrate Report</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <section>
            <div class="container" id="reportDiv">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td id="aitLogo">
                      <img src="../images\logo.png" height="100" width="100">
                    </td>
                    <td id="aitName">
                      <h2>Adarsh Institute Of Technology and Research Centre Vita</h2>
                      <h5>Student Leaves Report</h5>
                    </td>
                  </tr>

                  <tr>
                    <td id="profileHolder">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" id="reportProfile" height="150" width="150">
                    </td>
                    <td id="infoHolder">
                      <h5 id="stdName"></h5>
                      <h5 id="stdClass"></h5>
                      <h5 id="stdDepartment"></h5>
                      <h5 id="stdMob"></h5>
                    </td>
                  </tr>
                </tbody>
              </table>
              
              <!-- Card Body -->
              <div class="table-responsive">
                <table class="table table-bordered" id="reportTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Leave Type</th>
                      <th>Reason</th>
                      <th>When</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>BY Teacher</th>
                      <th>By HOD</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="reload()">Cancel</button>
          <button class="btn btn-primary" type="button" onclick="printDiv()">Print</button>
        </div>
      </div>
    </div>
  </div>
  <!-- -------------------- Report Modal  START ----------------------------------------->

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
    $('#inputGroupFile01').on('change', function() {
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
    $('#inputGroupFile06').on('change', function() {
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

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
      
      $('.editbtn').on('click', function() {
        var index = this.id;
        console.log(this.id)
          $('#updateStudentModal').modal('show');

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj);
          
          document.getElementById("student_id").value = myObj[index].StudentID;
          document.getElementById("firstName").value = myObj[index].FirstName;
          document.getElementById("lastName").value = myObj[index].LastName;
          document.getElementById("rollNo").value = myObj[index].RollNo;
          document.getElementById("parentContactNo").value = myObj[index].ParentContactNo;
          document.getElementById("studentContactNo").value = myObj[index].StudentContactNo;
          document.getElementById("username").value = myObj[index].Username;
          document.getElementById("password").value = myObj[index].Password;
        }

        xmlhttp.open("POST", "getStudents.php");
        xmlhttp.send();

      });

    });

    $(document).ready(function() {

      $('.genrateReport').on('click', function() {
        // Show Bootstrap modal
        $('#reportModal').modal('show');
        // $('.genrateReport').attr("disabled", true)
         
        // alert(this.id)
        $imgPath = "img" + this.id;
        // alert($imgPath)
        var imagePath = document.getElementById($imgPath).src;
        // alert(imagePath)


        const $tr = $(this).closest("tr");
        const data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        // Create a FormData object to send data to the server
        const formData = new FormData();
        formData.append('studentId', data[1]);

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
          const myObj = JSON.parse(this.responseText);
          console.log(myObj)
          
          if(myObj.length==0){
            alert("No data Found")
            var tableBody = document.querySelector('#reportTable tbody').remove();

          }
          console.log(data);

          
          document.getElementById("reportProfile").src = imagePath;
          document.getElementById("stdName").innerHTML = " " + data[2] + data[3];
          document.getElementById("stdDepartment").innerHTML = " " +"<?php echo $_SESSION["hod_department"]?>";
          document.getElementById("stdClass").innerHTML = " " + data[4];
          document.getElementById("stdMob").innerHTML = " " + data[6];

          for (var i = 0; i < myObj.length; i++) {
            var tableBody = document.querySelector('#reportTable tbody');
            var row = tableBody.insertRow();

            var cell1 = row.insertCell(0).textContent = myObj[i].LeaveType;
            var cell3 = row.insertCell(1).textContent = myObj[i].Reason;
            var cell4 = row.insertCell(2).textContent = myObj[i].DateTime;
            var cell5 = row.insertCell(3).textContent = myObj[i].StartDate;
            var cell6 = row.insertCell(4).textContent = myObj[i].EndDate;
            var cell7 = row.insertCell(5).textContent = myObj[i].TeacherApprovalStatus;
            var cell7 = row.insertCell(6).textContent = myObj[i].HODApprovalStatus;
          }

        };

        xmlhttp.open("POST", "student_leaves.php");
        // xmlhttp.send();

        xmlhttp.send(formData);
      });


    });

    // function to print report
    function printDiv() {
      var contentToPrint = document.getElementById("reportDiv").innerHTML;
      var originalContent = document.body.innerHTML;

      document.body.innerHTML = contentToPrint;

      window.print();

      // Restore the original document content
      document.body.innerHTML = originalContent;
    }
    function reload(){
      location.reload();
    }
  </script>
</body>

</html>
<?php
include "../db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  // Assuming your form has fields named accordingly

  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $department = $_SESSION["hod_department"];
  $class = $_POST["class"];
  $course = $_SESSION["hod_course"];
  $student_mo = $_POST["student_mo"];
  $parent_mo = $_POST["parent_mo"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $roll_no = $_POST["roll_no"];


  function alert($message)
  {
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

  // Validate course
  $course = trim($_SESSION["hod_course"]);
  if (empty($course)) {
    alert("Course is required.");
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
  $targetDirectory = "../profiles/students/"; // Change this to your desired upload directory
  $targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if the image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if ($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check file size
  if ($_FILES["profile"]["size"] > 50000000) {
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
  $stmt_insert_profile = $conn->prepare("INSERT INTO students (FirstName, LastName, RollNo, Department, Class, StudentContactNo, ParentContactNo, Username, Password, ProfilePhoto, course) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("sssssssssss", $first_name, $last_name, $roll_no, $department, $class, $student_mo, $parent_mo, $username, $password, $targetFile, $course);

  // Execute the query
  if ($stmt_insert_profile->execute()) {
    echo '<script>alert("Student Added.")
      </script>';
  } else {
    die("Error: " . $stmt_insert_profile->error);
  }

  // Close the statement
  $stmt_insert_profile->close();
}

// delete student profile


?>