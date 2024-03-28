<?php
$server = "localhost";
$username = "root";
$password = "arzelzolina10";
$dbname = "food";

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
