
<?php


include "databaseConnection.php";
error_reporting(0);

$username= $_GET['username'];
$workname= $_GET['taskname'];

$idnum= $_GET['idnum'];

$table_name= $_GET['table_name'];





$sql = "DELETE FROM $table_name WHERE id=$idnum ";



mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
//echo "<a href='task.php?table_name=".$table_name." & username=".$username."& workname=".$workname."'>return to work area </a>";
ob_start();

   header("Location: task.php?table_name=".$table_name." & username=".$username."& workname=".$workname."");
ob_end_flush(); 


} else {
echo "Error deleting record: " . mysqli_error($conn);
}

?>