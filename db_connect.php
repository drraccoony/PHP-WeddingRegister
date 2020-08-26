<?
  $servername = "localhost";
  $username = "drraccoo_weduser";
  $password = "REDACTED";
  $dbname = "drraccoo_wedding";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>
