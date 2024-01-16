
<?php
session_start();
include "../db_connect.php";

$hod_id = $_POST["hodId"];

// echo $student_id;
$stmt = $conn->prepare("DELETE FROM hods WHERE `HODID` = '$hod_id'");
$stmt->execute();
if($stmt->execute()){
    echo '<script>
    alert("HOD deleted successfully");
    window.location.href="home.php";
    </script>';
}
?>

