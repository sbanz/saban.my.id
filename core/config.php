<?php

$databaseHost = 'localhost';
$databaseName = 's3_web_saban';
$databaseUsername = 'root';
$databasePassword = '';

$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(!$connection) {
  die('Connection Error: ' . mysqli_connect_errno());
}
?>