<?php
include "../db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Assuming your form has fields named accordingly

  $first_name = $_POST["firstName"];
  $last_name = $_POST["lastName"];
  $department = $_POST["department"];
  $class = $_POST["class"];
  $course = $_POST["course"];
  $student_mo = $_POST["studentContactNo"];
  $parent_mo = $_POST["parentContactNo"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $roll_no = $_POST["rollNo"];



  function alert($message)
  {
    echo '<script>
    alert("' . $message . '");
    </script>';
  }

  // Validate first name
  $first_name = trim($_POST["firstname"]);
  if (empty($first_name)) {
    alert("First name is required.");
    exit;
  }

  // Validate last name
  $last_name = trim($_POST["lastname"]);
  if (empty($last_name)) {
    alert("Last name is required.");
    exit;
  }

  // Validate course
  $course = trim($_POST["course"]);
  if (empty($course)) {
    alert("Course is required.");
    exit;
  }

  // Validate class
  $class = trim($_POST["class"]);
  if (empty($class)) {
    alert("Class is required.");
    exit;
  }

  // Validate student contact number
  $student_mo = trim($_POST["studentContactNo"]);
  if (empty($student_mo) || !preg_match("/^\d{10}$/", $student_mo)) {
    alert("Invalid student contact number.");
    exit;
  }

  // Validate parent contact number
  $parent_mo = trim($_POST["parentContactNo"]);
  if (empty($parent_mo) || !preg_match("/^\d{10}$/", $parent_mo)) {
    alert("Invalid parent contact number.");
    exit;
  }

  // Validate username
  $username = trim($_POST["username"]);
  if (empty($username) || !preg_match("/^\d{10}$/", $username)) {
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
  $targetDirectory = "../profiles/students/"; // Change this to your desired upload directory
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
  if ($_FILES["profile"]["size"] > 50000000) {
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
  $stmt_insert_profile = $conn->prepare("INSERT INTO students (FirstName, LastName, RollNo, Department, Class, StudentContactNo, ParentContactNo, Username, Password, ProfilePhoto, course) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("sssssssssss", $first_name, $last_name, $roll_no, $department, $class, $student_mo, $parent_mo, $username, $password, $targetFile, $course);

  // Execute the query
  if ($stmt_insert_profile->execute()) {
    echo '<script>alert("Student Added.")
      </script>';
  } else {
    die("Error: " . $stmt_insert_profile->error);
  }

  // Close the statement
  $stmt_insert_profile->close();
}

// delete student profile


?>