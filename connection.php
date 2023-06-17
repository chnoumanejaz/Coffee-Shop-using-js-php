<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "coffeeshop";

$connection = mysqli_connect($servername, $username, $password, $database);
if(!$connection)
{
    die("Error database: " .mysqli_error($connection));
}
?>