<?php
include "../../db_connect.php";

$complaint_id = $_POST["complaint_id"];

if (isset($_POST["action"], $_POST["complaint_id"])) {
    $action = $_POST["action"];
    $complaint_id = $_POST["complaint_id"];

    // Process the form based on the selected action and student ID
    switch ($action) {
        case "Solved":
            // Handle the approval logic
            // echo " Leave Approved, Student ID: $student_id";
            $status = "Solved";
            break;

        case "Reviewed":
            // Handle the rejection logic
            // echo "Leave Rejected, Student ID: $student_id";
            $status = "Reviewed";
            break;
    }
}

// Use prepared statement to prevent SQL injection
$stmt_hod_status = $conn->prepare("UPDATE complaints SET ByHOD = ? WHERE ComplaintID = ?");

if (!$stmt_hod_status) {
    die("Error in preparing the statement: " . $conn->error);
}

$stmt_hod_status->bind_param("ss", $status, $complaint_id);


// Execute the query
if ($stmt_hod_status->execute()) {
    echo '<script>';
    echo 'alert("Complaint ' . $status . '");';
    echo 'window.location.href = "student.php";';
    echo '</script>';
} else {
    die("Error: " . $stmt_insert_profile->error);
}



// Close the statement
$stmt_hod_status->close();
?>