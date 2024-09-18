<?php

include "databaseConnection.php";
error_reporting(0);


session_start();


$cousername= $_GET['cousername'];
$username= $_GET['username'];

$msgtable= ($username."_msg");
$comsgtable= ($cousername."_msg");

$couser= ($cousername.$username);
$user= ($username.$cousername);

$upd= "UPDATE $msgtable SET readmsg = 'read' WHERE username= '$user'";

mysqli_query($conn, $upd);




?>
