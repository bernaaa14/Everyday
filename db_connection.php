<?php


$servername = "localhost"; // Default servername is localhost
$username = "root"; // Default username is root
$password = ""; // Default password is empty
$dbname = "sk_acc"; // Change this to your database name according to your database name: Schema_name

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error) { // Check connection to the database
    die("Connection failed: " . $conn->connect_error);
}
