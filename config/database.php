<?php
  $dbHostname = 'localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName     = 'timedoor_challenge'; 

  $db = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbName);

  if (mysqli_connect_errno()){
    echo 'Failed to connect database : ' . mysqli_connect_error();
  }

  date_default_timezone_set("Asia/Bangkok");
?>
