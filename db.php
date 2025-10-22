<?php
$host = "localhost";
$dbname = "dbkmm3ssm45d32";
$username = "ueyhm8rqreljw";
$password = "gutn2hie5vxa";

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit;
}
?>
