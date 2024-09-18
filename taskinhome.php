
<?php

include "databaseConnection.php";
error_reporting(0);

$firstname= $_GET['firstname'];
$username= $_GET['username'];

$task_name=  $_GET['task_name'];
$taskname= $_GET['taskname'];
$table_name= $_GET['table_name'];
$idnum= $_GET['idnum'];


$cwln= ($username."_coworkerlist");

$sql20 = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql20)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$friendusername= $row['cousername'];

$cohome= ($friendusername."_home");
$info= ('a task was added in '.$taskname.' which is Public Now, and its name is '.$task_name.', created by-->>');


$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('$info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


}}}
ob_start();

   header("Location: taskstatus.php?firstname=$firstname&username=$username&taskname=$taskname&task_name=$task_name&table_name=$table_name&idnum=$idnum");
ob_end_flush(); 

?>
