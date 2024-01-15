
<?php
session_start();
include "../db_connect.php";

$teacher_id = $_POST["teacherId"];

// echo $student_id;
$stmt = $conn->prepare("DELETE FROM teachers WHERE `TeacherID` = $teacher_id");
$stmt->execute();
if($stmt->execute()){
    echo '<script>
    alert("Teacher deleted successfully");
    window.location.href="addFaculty.php";
    </script>';
}
?>

