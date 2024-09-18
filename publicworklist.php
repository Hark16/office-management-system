<?php

include "databaseConnection.php";
error_reporting(0);

$idnum=$_GET['idnum'];
$wln= $_GET['wln'];
$username = $_GET['username'];
$name = $_GET['name'];
$firstname = $_GET['firstname'];



$cwln= ($username."_coworkerlist");

$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$friendusername= $row['cousername'];

$cohome= ($friendusername."_home");
$info= ('a worklist was created which name was '.$name.' and it is public Now, created by-->>');


$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('$info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


}}}


$pub= "UPDATE $wln SET public='public' WHERE id= '$idnum' ";

mysqli_query($conn, $pub);
ob_start();

   header("Location: worklist.php");
ob_end_flush(); 


?>
