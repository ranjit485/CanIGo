
<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

include "../../db_connect.php";

$date = date("Y-m-d");
$dateElements = explode('-', $date);
$year = $dateElements[0];
$month = $dateElements[1];
$day = $dateElements[2];

// $class = $_POST['class']; 

$hod_id = $_SESSION["hod_id"];
$complaintsFrom = $_POST['complaint-from'];
$complaintTo = $_POST['complaint-to'];
$complaintType = $_POST['type'];
$who = $_POST['who']; // it may student or teacher


// echo " HOD ID : $hod_id";
// echo " FROM : $complaintsFrom";
// echo " TO $complaintTo";
// echo " TYPE : $complaintType";
// echo " WHO : $who";


$t="teacher";
$s=0;


if($who == $t){
        // echo $studentId;
    $stmt = $conn->prepare("
    SELECT * 
    FROM
        teacher_complaints
    WHERE
        HODID = $hod_id
        AND ComplaintType = '$complaintType' 
        AND DateTime >= '$complaintsFrom' 
        AND DateTime <= '$complaintTo'   
    ORDER BY DateTime
    ");

}
else{
    // echo $studentId;
    $stmt = $conn->prepare("
    SELECT * 
    FROM
        complaints
    WHERE
        HODID = $hod_id
        AND ComplaintType = '$complaintType' 
        AND DateTime >= '$complaintsFrom' 
        AND DateTime <= '$complaintTo'   
    ORDER BY DateTime
    ");
}

$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>

