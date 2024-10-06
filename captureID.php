<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "login_sample_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }

  // Retrieve the RFID tag from the URL parameter
  $rfid = $_GET['id'];

  // Insert data into the database
  $sql = "INSERT INTO rfid_data (rfid_tag, timestamp) VALUES ('$rfid', NOW())";
  $conn->query($sql);

  // Close the connection
  $conn->close();
?>