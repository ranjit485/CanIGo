<?php 
session_start();
session_unset();
session_destroy();
echo"Your have been successfully logged out";
header("Location: index.php");
?>