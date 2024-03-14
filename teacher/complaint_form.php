
<!-- -----------------Modal Start Leave form---------------------- -->

<!-- Modal -->
<div class="modal fade" id="complaintFormModel" tabindex="-1" role="dialog" aria-labelledby="complaintFormModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Complaint Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form onsubmit="return validateForm()" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <!-- <form onsubmit="return validateForm()" action="student_home.php" method="post"> -->
        <!-- Leave Details -->
        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="complaintType">Complaint Type</label>
              <select id="complaintType" name="complaintType" class="form-control" required>
                  <option value="" selected disabled>About Complaint </option>
                  <option value="Falculty">Falculty Related</option>
                  <option value="Raging">Raging</option>
                  <option value="SchoolBus">School Bus</option>
                  <option value="Office">Office Staff</option>
                  <option value="canteen">Canteen</option>
                  
              </select>
          </div>
      </div>
        <label for="reason">Discription for Complaint </label>
        <textarea class="form-control" name="discription" rows="3" required></textarea>
        <small id="reasonHelp" class="form-text text-muted">Note: You can write discription in Marathi</small>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Submit Application</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- -----------------Modal End Leave form---------------------- -->
<?php
include "../db_connect.php";

// Check if student_id is set in the session
if (!isset($_SESSION["teacher_id"])) {
    die("Error: Teacher ID not found in the session. Please check your login logic.");
}

$teacher_id = $_SESSION["teacher_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Assuming your form has fields named accordingly
    $hod_id = $_SESSION["hod_id"];
    $complaint_type = $_POST["complaintType"];
    $discription = $_POST["discription"];
    // Use prepared statement to prevent SQL injection
    $stmt_insert_complaint = $conn->prepare("INSERT INTO teacher_complaints (TeacherID,HODID, ComplaintType, ByHOD,ByAdmin, Discription) VALUES (?,?,?,'Assigend','Assigend',?)");
    
    if (!$stmt_insert_complaint) {
        die("Error in preparing the statement: " . $conn->error);
    }

    $stmt_insert_complaint->bind_param("ssss", $teacher_id,$hod_id, $complaint_type,$discription);

    // Execute the query
    if ($stmt_insert_complaint->execute()) {
        echo '<script>alert("Complaint Added")
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>';
    } else {
        die("Error: " . $stmt_insert_complaint->error);
    }

    // Close the statement
    $stmt_insert_complaint->close();
}

// Close the connection
$conn->close();
?>


