<?php
$servername = "us-cdbr-east-05.cleardb.net";
$username = "b241659a762e01";
$password = "8ff51cab";
$db = "heroku_d060d81cfdb8333";
$conn = "";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>