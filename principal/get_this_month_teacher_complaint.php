
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../db_connect.php";

$id = $_SESSION["hod_id"];


// set date and time

$date = date("Y-m-d");
$dateElements = explode('-', $date);
$year = $dateElements[0];
$month = $dateElements[1];
$day = $dateElements[2];

// $stmt = $conn->prepare("SELECT * FROM leaves WHERE HODID = $id AND DATE(DateTime) = CURDATE()");
$stmt = $conn->prepare("SELECT * FROM teacher_complaints WHERE MONTH(DateTime) = $month");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

