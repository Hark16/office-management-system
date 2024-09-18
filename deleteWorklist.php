
<?php
include "databaseConnection.php";
error_reporting(0);

$workname= $_GET['workname'];
$username= $_GET['username'];
$idnum= $_GET['idnum'];
$table= ($username."_worklist");


$name = $_GET['name'];
$firstname = $_GET['firstname'];

if($idnum>1){


$cwln= ($username."_coworkerlist");

$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$friendusername= $row['cousername'];

$cohome= ($friendusername."_home");
$info= ('a worklist was created which name was '.$name.' and it is Deleted now, it is no more , created by-->>');


$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('$info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


}}}



$subtable= ($username."_".$workname);

$sql = "DELETE FROM $table WHERE id=$idnum ";

$del= "DROP TABLE $subtable ";

mysqli_query($conn, $del);

if (mysqli_query($conn, $sql)) {
   header("Location: worklist.php");
}
}
ob_start();

   header("Location: worklist.php");
ob_end_flush();  

//else {
//echo "Error deleting record: " . mysqli_error($conn);
//}

?>