<?php

include "databaseConnection.php";
error_reporting(0);

$firstname= $_GET['firstname'];

$username= $_GET['username'];
$cwln= $_GET['cwln'];
$idnum= $_GET['idnum'];
$cousername= $_GET['cousername'];
$wln= ($cousername."_coworkerlist");
$cohome= ($cousername."_home");

$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('your co-worker request is accepted, check your co-workerlist for more info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


$upd= "UPDATE $cwln SET status='accepted' WHERE id= '$idnum' ";

mysqli_query($conn, $upd);
$upd1= "UPDATE $wln SET status='accepted' WHERE cousername= '$username' ";

mysqli_query($conn, $upd1);


ob_start();
header("Location: coworkerlist.php");

ob_end_flush(); 
?>