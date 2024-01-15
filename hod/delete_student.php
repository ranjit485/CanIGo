
<?php
session_start();
include "../db_connect.php";

$student_id = $_POST["studentId"];

// echo $student_id;
$stmt = $conn->prepare("DELETE FROM students WHERE `StudentID` = $student_id");
$stmt->execute();
if($stmt->execute()){
    echo '<script>
    alert("Student deleted successfully");
    window.location.href="add-student.php";
    </script>';
}
?>

