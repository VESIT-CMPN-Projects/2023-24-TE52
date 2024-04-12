<?php 
$database = "carboneutral";
$username = "Dhara";
$password = "Bhatia@12";
$hostname = "localhost";
$port = 3307;
$conn = mysqli_connect($hostname, $username, $password, $database,$port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}