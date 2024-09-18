<?php

session_start();

include "databaseConnection.php";

error_reporting(0);

$username= $_GET['username'];
$cwln= $_GET['cwln'];
$idnum= $_GET['idnum'];
$cousername= $_GET['cousername'];
$wln= ($cousername."_coworkerlist");
$firstname= $_GET['firstname'];

$cohome= ($cousername."_home");

$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('your co-worker request is rejected, check your co-workerlist for more info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


$upd= "UPDATE $cwln SET status='deleted' WHERE id= '$idnum' ";

mysqli_query($conn, $upd);
$upd1= "UPDATE $wln SET status='deleted' WHERE cousername= '$username' ";

mysqli_query($conn, $upd1);


ob_start();
$_SESSION['firstname']= $firstname;
$_SESSION['username']= $username;


header("Location: coworkerlist.php");
ob_end_flush(); 


?>
