
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../db_connect.php";

$date = date("Y-m-d");
$dateElements = explode('-', $date);
$year = $dateElements[0];
$month = $dateElements[1];
$day = $dateElements[2];

$id = $_SESSION["hod_id"];
// $class = $_POST['class']; 
$class ="TY";


// echo $studentId;
$stmt = $conn->prepare("SELECT * FROM leaves INNER JOIN students ON leaves.StudentID = students.StudentID WHERE leaves.HODID = $id AND DAY(leaves.DateTime) = $date AND Class =$class");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

