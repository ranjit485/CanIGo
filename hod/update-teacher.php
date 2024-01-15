
<?php
include "../db_connect.php";
session_start();

$first_name = $_POST["firstName"];
$teacher_id = $_POST["teacherID"];
$last_name = $_POST["lastName"];
$course = $_SESSION["hod_course"];
$department = $_SESSION["hod_department"];
$class = $_POST["class"];
$position = $_POST["position"];
$username = $_POST["username"];
$password = $_POST["password"];


// Handle image upload
$targetDirectory = "../profiles/teachers/"; // Change this to your desired upload directory
$targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

echo $targetFile;

if ($targetFile == '../profiles/teachers/') {
  echo 'img empty';

  $stmt_insert_profile = $conn->prepare("UPDATE teachers
    SET
        FirstName = ?,
        LastName = ?,
        course = ?,
        Department = ?,
        Class = ?,
        Position = ?,
        Username = ?,
        Password = ?
    WHERE
        TeacherID = ?;
    ");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }
  $stmt_insert_profile->bind_param("sssssssss", $first_name, $last_name, $course, $department, $class, $position, $username, $password, $teacher_id);
} else {

  // Check if the image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check file size
  if ($_FILES["profile"]["size"] > 500000) {
    alert("Sorry, your file is too large.");
    $uploadOk = 0;
  }

  // Allow only certain file formats
  $allowedExtensions = array("jpg", "jpeg", "png", "gif");
  if (!in_array($imageFileType, $allowedExtensions)) {
    alert("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
    $uploadOk = 0;
  }

  $stmt_insert_profile = $conn->prepare("UPDATE teachers
      SET
        FirstName = ?,
        LastName = ?,
        course = ?,
        Department = ?,
        Class = ?,
        Position = ?,
        Username = ?,
        Password = ?,
        ProfilePhoto = ?
      WHERE
          TeacherID = ?;
      ");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("ssssssssss", $first_name, $last_name, $course, $department, $class, $position, $username, $password, $targetFile, $teacher_id);
}


// Execute the query
if ($stmt_insert_profile->execute()) {
  echo '<script>alert("Teacher updated.")
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
      </script>';
  // header("location:addFaculty.php");
} else {
  die("Error: " . $stmt_insert_profile->error);
}

// Close the statement
$stmt_insert_profile->close();


?>