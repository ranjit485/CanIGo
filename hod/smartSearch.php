
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../db_connect.php";

$date = date("Y-m-d");
$dateElements = explode('-', $date);
$year = $dateElements[0];
$month = $dateElements[1];
$day = $dateElements[2];

// $class = $_POST['class']; 

$hod_id = $_SESSION["hod_id"];
$leavesFrom = $_POST['from'];
$leavesTo = $_POST['to'];
$class = $_POST['Class'];

// echo $studentId;
$stmt = $conn->prepare("
SELECT
    l.*,
    s.FirstName AS StudentFirstName,
    s.LastName AS StudentLastName,
    t.FirstName AS TeacherFirstName,
    t.LastName AS TeacherLastName
FROM
    leaves l
LEFT JOIN students s ON l.StudentID = s.StudentID
LEFT JOIN teachers t ON l.TeacherID = t.TeacherID
WHERE
    l.HODID = $hod_id
    AND s.Class = '$class' -- Specify the class (e.g., 'SY')
    AND DATE(l.StartDate) >= '$leavesFrom' -- Start date
    AND DATE(l.EndDate) <= '$leavesTo'   -- End date
ORDER BY
    l.StartDate;
");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

