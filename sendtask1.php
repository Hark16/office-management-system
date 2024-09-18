
<?php


include "databaseConnection.php";
error_reporting(0);

$cousername= $_GET['cousername'];
$coworkname= $_GET['coworkname'];
$workname= $_GET['workname'];

$username= $_GET['username'];
$firstname= $_GET['firstname'];
$thetask= $_GET['thetask'];
$about= $_GET['about'];
$year= $_GET['year'];
$month= $_GET['month'];
$date= $_GET['date'];
$hour= $_GET['hour'];
$minute= $_GET['minute'];
$second= $_GET['second'];

$table_name= ($cousername."_coworkertask");


$ins= "INSERT INTO $table_name (task_name, about, year, month, date, hour, minute, second, status, public, created_firstname, created_username) VALUES('$thetask', '$about', '$year', '$month', '$date', '$hour', '$minute', '$second', 'uncompleted', 'private', '$firstname', '$username')";

mysqli_query($conn, $ins);


$cwln= ($username."_coworkerlist");

$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$friendusername= $row['cousername'];

$cohome= ($friendusername."_home");
$info= ('You recived a task named '.$thetask.' about is '.$about.' which was created on '.$workname.' created by-->');



$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('$info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


}}}


ob_start();

   header("Location: sendtask.php?firstname=$firstname&username=$username&thetask=$thetask&about=$about&year=$year&month=$month&date=$date&hour=$hour&minute=$minute&second=$second&taskname=$workname");
ob_end_flush(); 
?>
