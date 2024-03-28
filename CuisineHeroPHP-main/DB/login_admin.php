<?php
session_start();
include 'cred.php';

// POST data
$email = $_POST['LogEmail'];
$pw1 = $_POST['LogPassword'];

$con = mysqli_connect($server, $username, $password, $dbname);

// Query to check if the user is an admin
$ins = "SELECT * FROM acc WHERE email ='$email' AND pass='$pw1' AND role='admin'";
$result = mysqli_query($con, $ins);
$idfier = mysqli_num_rows($result);

if ($idfier == 1) {
    // Admin found, set session variables and redirect to admin panel
    while ($NameRes = mysqli_fetch_array($result)) {
        $_SESSION['firstname'] = $NameRes['firstname'];
        $_SESSION['email'] = $NameRes['email'];
    }
    header('location:../feed_admin.php');
} else {
    // Admin not found, redirect to login page
    header('location:../index.php');
}
