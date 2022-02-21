<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "librarys";

// Create connection
$conn = new mysqli($servername, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// function CheckLogin(){
//   if(!isset($_SESSION["status"])){
//       header("location: index.php");
//       exit;
//   }
// }
// echo "Connected successfully";
?>