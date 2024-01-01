
<!-- -----------------Modal Start Leave form---------------------- -->

<!-- Modal -->
<div class="modal fade" id="leaveFormModel" tabindex="-1" role="dialog" aria-labelledby="leaveFormModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Form</h5>
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
              <label for="leaveType">Leave Type</label>
              <select id="leaveType" name="leave_type" class="form-control" required>
                  <option value="" selected disabled>Select leave type</option>
                  <option value="Sick Leave">Sick Leave</option>
                  <option value="Vacation">Vacation</option>
                  <option value="Other">Other</option>
              </select>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
             <label for="startDate">Start Date</label>
             <input type="datetime-local" name="start_date" class="form-control" id="startDate" required>
          </div>
          <div class="form-group col-md-6">
              <label for="endDate">End Date</label>
              <input type="datetime-local" name="end_date" class="form-control" id="endDate" required>
          </div>
      </div> 
        <label for="reason">Reason for Leave (Minimum 30 words)</label>
        <textarea class="form-control" name="reason" rows="3" required></textarea>
        <small id="reasonHelp" class="form-text text-muted">Minimum 10 words required.</small>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Submit Application</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
  function validateForm() {
      // Get the value of the "Reason for Leave" textarea
      var reason = document.getElementById("reason").value;

      // Split the reason text into words
      var words = reason.split(/\s+/).filter(function (word) {
          return word.length > 0; // Filter out empty words
      });

      // Check if the word count is at least 30
      if (words.length < 10) {
          alert("Please provide a reason with at least 10 words.");
          return false; // Prevent form submission
      }
      // alert("submited")      
      return true; // Allow form submission
  }
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<!-- -----------------Modal End Leave form---------------------- -->
<?php
include "db_connect.php";

// Check if student_id is set in the session
if (!isset($_SESSION["student_id"])) {
    die("Error: Student ID not found in the session. Please check your login logic.");
}

$student_id = $_SESSION["student_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Assuming your form has fields named accordingly
    $teacher_id = 1;
    $hod_id = 1;
    $leave_type = $_POST["leave_type"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $reason = $_POST["reason"];
    echo $leave_type;
    // Use prepared statement to prevent SQL injection
    $stmt_insert_leave = $conn->prepare("INSERT INTO Leaves (StudentID, TeacherID, HODID, LeaveType, StartDate, EndDate, Status, Reason, TeacherApprovalStatus, HODApprovalStatus) VALUES (?, ?, ?, ?, ?, ?, 'Pending', ?, 'Assigned', 'Assgined')");
    
    if (!$stmt_insert_leave) {
        die("Error in preparing the statement: " . $conn->error);
    }

    $stmt_insert_leave->bind_param("iiissss", $student_id, $teacher_id, $hod_id, $leave_type, $start_date, $end_date, $reason);

    // Execute the query
    if ($stmt_insert_leave->execute()) {
        echo '<script>alert("Leave request submitted successfully.")
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>';
    } else {
        die("Error: " . $stmt_insert_leave->error);
    }

    // Close the statement
    $stmt_insert_leave->close();
}

// Close the connection
$conn->close();
?>


