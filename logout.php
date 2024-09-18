
<?php
include "databaseConnection.php";
error_reporting(0);


$username= $_GET['username'];

$pub= "UPDATE prabandh_users SET login = 'logout' WHERE username = '$username' ";

mysqli_query($conn, $pub);

session_start();  
session_destroy();  

   header("Location: login.php");


?>
