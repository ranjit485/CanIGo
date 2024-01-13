<?php
include "../db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  // Assuming your form has fields named accordingly

  $first_name = $_POST["firstName"];
  $last_name = $_POST["lastName"];
  $course = $_POST["course"];
  $department = $_POST["department"];
  $class = $_POST["class"];
  $position = $_POST["position"];
  $username = $_POST["username"];
  $password = $_POST["password"];
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

  // Validate department
  $department = trim($_POST["department"]);
  if (empty($department)) {
    alert("Department is required.");
    exit;
  }

  // Validate class
  $position = trim($_POST["position"]);
  if (empty($position)) {
    alert("Class is required.");
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
  $targetDirectory = "../students\profile"; // Change this to your desired upload directory
  $targetFile = $targetDirectory . basename($_FILES["profile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

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

  // Continue with your existing code...

  // Use prepared statement to prevent SQL injection
  $stmt_insert_profile = $conn->prepare("INSERT INTO teachers (FirstName, LastName, course, Class, Department, Position, Username, Password, ProfilePhoto) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");

  if (!$stmt_insert_profile) {
    die("Error in preparing the statement: " . $conn->error);
  }

  // Bind parameters
  $stmt_insert_profile->bind_param("sssssssss", $first_name, $last_name, $course ,$class,$department, $position, $username, $password, $targetFile);

  // Execute the query
  if ($stmt_insert_profile->execute()) {
    echo '<script>alert("Teacher Added.")
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
      </script>';
  } else {
    die("Error: " . $stmt_insert_profile->error);
  }

  // Close the statement
  $stmt_insert_profile->close();
}
?>