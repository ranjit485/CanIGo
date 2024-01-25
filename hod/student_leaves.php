
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../db_connect.php";

$id = $_SESSION["hod_id"];
$studentId = $_POST['studentId']; 
// echo $studentId;
$stmt = $conn->prepare("SELECT * FROM leaves WHERE StudentID = $studentId");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

