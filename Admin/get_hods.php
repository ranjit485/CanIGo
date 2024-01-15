
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../db_connect.php";

$admin_course = $_SESSION["admin_course"];

$stmt = $conn->prepare("SELECT * FROM hods WHERE course = '$admin_course'");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

