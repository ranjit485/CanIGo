<?php
include "../db_connect.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  // Assuming your form has fields named accordingly

  $hod_course = $_SESSION["admin_course"];
  $first_name = $_POST["firstName"];
  $last_name = $_POST["lastName"];
  $department = $_POST["department"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  echo $_POST["firstName"];
  echo $_POST["firstName"];
  function alert($message)
  {
    echo '<script>
    alert("' . $message . '");
    </script>';
  }
  
  // Validate first name
  $first_name = trim($_POST["firstName"]);
  if (empty($first_name)) {
    alert("First name is required.");
    exit;
  }

  // Validate last name
  $last_name = trim($_POST["lastName"]);
  if (empty($last_name)) {
    alert("Last name is required.");
    exit;
  }

  // Validate course
  $hod_course = trim($_SESSION["admin_course"]);
  if (empty($hod_course)) {
    alert("Course is required.");
    exit;
  }


  // Validate username
  $username = trim($_POST["username"]);
  if (empty($username)) {
    alert("Username must be a 10-digit number.");
    exit;
  }

  // Validate password (you may want to add more complex checks)
  $password = trim($_POST["password"]);
  if (empty($password)) {
    alert("Password is required.");
    exit;
  }


  // Handle image upload
  $targetDirectory = "../profiles/hods/"; // Change this to your desired upload directory
  $targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if the image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if ($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
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

  // Continue with your existing code...

  // Use prepared statement to prevent SQL injection
  $stmt_insert_profile = $conn->prepare("INSERT INTO hods (FirstName, LastName, Department, Username, Password, ProfilePhoto, course) VALUES (?, ?, ?, ?, ?, ?, ?)");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("sssssss", $first_name, $last_name, $department, $username, $password, $targetFile, $hod_course);

  // Execute the query
  if ($stmt_insert_profile->execute()) {
    echo '<script>alert("HOD Added.")
    window.location.href="home.php";
      </script>';
  } else {
    die("Error: " . $stmt_insert_profile->error);
  }

  // Close the statement
  $stmt_insert_profile->close();
}

// delete student profile


?>