<?php
include "../db_connect.php";

$student_id = $_POST["student_id"];

if (isset($_POST["action"], $_POST["student_id"])) {
    $action = $_POST["action"];
    $student_id = $_POST["student_id"];
    $leaveID = $_POST["leave_id"];

    // Process the form based on the selected action and student ID
    switch ($action) {
        case "approve":
            // Handle the approval logic
            // echo " Leave Approved, Student ID: $student_id";
            $status = "Approved";
            break;

        case "reject":
            // Handle the rejection logic
            // echo "Leave Rejected, Student ID: $student_id";
            $status = "Rejected";
            break;
    }
}

// Use prepared statement to prevent SQL injection
$stmt_hod_status = $conn->prepare("UPDATE leaves SET HODApprovalStatus = ? WHERE StudentID = ? AND LeaveID =?");

if (!$stmt_hod_status) {
    die("Error in preparing the statement: " . $conn->error);
}

$stmt_hod_status->bind_param("sss", $status, $student_id,$leaveID);


// Execute the query
if ($stmt_hod_status->execute()) {
    echo '<script>';
    echo 'alert("Leave ' . $status . '");';
    echo 'window.location.href = "home.php";';
    echo '</script>';
} else {
    die("Error: " . $stmt_insert_profile->error);
}



// Close the statement
$stmt_hod_status->close();
