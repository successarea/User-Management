<?php
$dbconnect = mysqli_connect('localhost','root','','login-register-dashboard');

if($dbconnect) {
    // echo "Database connected successfully";
} else {
    die("error: " . mysqli_connect_error());
}