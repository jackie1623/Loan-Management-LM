<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = ''; 
$dbName = 'crud';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn == false) {
    die("Connection failed: " . mysqli_connect_error());
}
?>