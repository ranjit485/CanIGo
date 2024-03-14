
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../db_connect.php";

$id = $_SESSION["hod_id"];
$hod_dept = $_SESSION["hod_department"];
$hod_course = $_SESSION["hod_course"];


$stmt = $conn->prepare("SELECT * FROM students WHERE `course` = '$hod_course' AND `Department` = '$hod_dept' ");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

