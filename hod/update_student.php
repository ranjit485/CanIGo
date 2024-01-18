<?php
include "../db_connect.php";
session_start();
$student_id = $_POST["student_id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$department = $_SESSION["hod_department"];
$class = $_POST["class"];
$course = $_SESSION["hod_course"];
$student_mo = $_POST["student_mo"];
$parent_mo = $_POST["parent_mo"];
$username = $_POST["username"];
$password = $_POST["password"];
$roll_no = $_POST["roll_no"];

function alert($message)
{
  echo '<script>
    alert("' . $message . '");
    </script>';
}

// Handle image upload
$targetDirectory = "../profiles/students/"; // Change this to your desired upload directory
$targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

echo $targetFile;

if ($targetFile == '../profiles/students/') {
  echo 'img empty';

  // Use prepared statement to prevent SQL injection
  $stmt_insert_profile = $conn->prepare("UPDATE students
    SET
        FirstName = ?,
        LastName = ?,
        RollNo = ?,
        Department = ?,
        Class = ?,
        StudentContactNo = ?,
        ParentContactNo = ?,
        Username = ?,
        Password = ?,
        Course = ?
    WHERE
        StudentID = ?;
    ");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }
  // Bind parameters
  $stmt_insert_profile->bind_param("sssssssssss", $first_name, $last_name, $roll_no, $department, $class, $student_mo, $parent_mo, $username, $password, $course, $student_id);
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
  if ($_FILES["profile"]["size"] > 500000000) {
    alert("Sorry, your file is too large.");
    $uploadOk = 0;
  }

  // Allow only certain file formats
  $allowedExtensions = array("jpg", "jpeg", "png", "gif");
  if (!in_array($imageFileType, $allowedExtensions)) {
    alert("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    // If everything is OK, try to upload file
    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
      alert("The file " . basename($_FILES["profile"]["name"]) . " has been uploaded.");
    } else {
      alert("Sorry, there was an error uploading your file.");
    }
  }
  $stmt_insert_profile = $conn->prepare("UPDATE students
      SET
          FirstName = ?,
          LastName = ?,
          RollNo = ?,
          Department = ?,
          Class = ?,
          StudentContactNo = ?,
          ParentContactNo = ?,
          Username = ?,
          Password = ?,
          ProfilePhoto = ?,
          Course = ?
      WHERE
          StudentID = ?;
      ");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("ssssssssssss", $first_name, $last_name, $roll_no, $department, $class, $student_mo, $parent_mo, $username, $password, $targetFile, $course, $student_id);

}



// Execute the query
if ($stmt_insert_profile->execute()) {
  echo '<script>alert("Student updated.")
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
      </script>';
  // header("location:add-student.php");

} else {
  die("Error: " . $stmt_insert_profile->error);
}

// Close the statement
$stmt_insert_profile->close();


?>