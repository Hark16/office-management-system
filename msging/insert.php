
<?php


include "databaseConnection.php";
error_reporting(0);

session_start();


$cousername= $_POST['cousername'];
$username= $_POST['username'];
$firstname= $_POST['firstname'];
$comsgtable= ($cousername."_msg");
$msgtable= ($username."_msg");
$user= ($username.$cousername);
$couser= ($cousername.$username);

$mymsg= $_POST['mymsg'];

$ins= "INSERT INTO $msgtable (message, firstname, username, readmsg) VALUES('$mymsg', '$firstname', '$user', 'read')";

mysqli_query($conn, $ins);

$coins= "INSERT INTO $comsgtable (message, firstname, username, readmsg) VALUES('$mymsg', '$firstname', '$couser', 'unread')";

mysqli_query($conn, $coins);


?>
