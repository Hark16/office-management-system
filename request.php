
<?php

include "databaseConnection.php";
error_reporting(0);

$fname= $_GET['fname'];

$name= $_GET['name'];
$username= $_GET['username'];
$wln= ($username."_coworkerlist");


$fusername=$_GET['fusername'];
$cwln= ($fusername."_coworkerlist");
$fhome= ($fusername."_home");


$inshome= "INSERT INTO $fhome (info, username, firstname) VALUES('a request recived to be your co-worker, check into co-workerlist', '$username', '$name')";

mysqli_query($conn, $inshome);


$ins= "INSERT INTO $cwln (coworkname, cousername, status) VALUES('$name', '$username', 'requested')";

mysqli_query($conn, $ins);
$ins1= "INSERT INTO $wln (coworkname, cousername, status) VALUES('$fname', '$fusername', 'requestsent')";

mysqli_query($conn, $ins1);
ob_start();

   header("Location: coworkerlist.php");
ob_end_flush(); 
?>
