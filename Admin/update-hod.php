
<?php
include "../db_connect.php";
session_start();

$course = $_SESSION["admin_course"];
$first_name = $_POST["firstName"];
$hod_id = $_POST["hod_id"];
$last_name = $_POST["lastName"];
$department = $_POST["department"];
$username = $_POST["username"];
$password = $_POST["password"];


function alert($message)
{
  echo '<script>
  alert("' . $message . '");
  </script>';
}

// Handle image upload
$targetDirectory = "../profiles/hods/"; // Change this to your desired upload directory
$targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

echo $targetFile;

if ($targetFile == '../profiles/hods/') {
  echo 'img empty';

  $stmt_insert_profile = $conn->prepare("UPDATE hods
    SET
        FirstName = ?,
        LastName = ?,
        course = ?,
        Department = ?,
        Username = ?,
        Password = ?
    WHERE
        HODID = ?;
    ");
  
  if (!$stmt_insert_profile) {

    die("Error in preparing the statement: " . $conn->error);
  }
  $stmt_insert_profile->bind_param("sssssss", $first_name, $last_name, $course, $department,$username, $password, $hod_id);
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

  $stmt_insert_profile = $conn->prepare("UPDATE hods
      SET
        FirstName = ?,
        LastName = ?,
        course = ?,
        Department = ?,
        Username = ?,
        Password = ?,
        ProfilePhoto = ?
      WHERE
          HODID = ?;
      ");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("ssssssss", $first_name, $last_name, $course, $department,$username, $password, $targetFile, $hod_id);
}


// Execute the query
if ($stmt_insert_profile->execute()) {
  echo '<script>alert("HOD updated.")
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
      </script>';
  header("location:home.php");
} else {
  die("Error: " . $stmt_insert_profile->error);
}

// Close the statement
$stmt_insert_profile->close();


?>