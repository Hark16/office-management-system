<?php

include "databaseConnection.php";
error_reporting(0);


session_start();


$cousername= $_GET['cousername'];
$username= $_GET['username'];
$firstname= $_GET['firstname'];
$comsgtable= ($cousername."_msg");
$msgtable= ($username."_msg");
$user= ($username.$cousername);
$couser= ($cousername.$username);

$sql = "SELECT * FROM $msgtable WHERE username= '$user' OR username= '$couser' ORDER BY id DESC";

$del= "DELETE FROM $msgtable WHERE id= 0";

mysqli_query($conn, $del);

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";
echo "<div class='row'>";
//echo "<th> number</th>";
echo "<div class='col-xs-6'> Sent by </div>";
echo "<div class='col-xs-6'> Message </div>";

echo "</div>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];



echo "<div class='row'>";
//echo "<td>" . $idnum. "</td>";
echo "<div class='col-xs-6'>" . $row['firstname'] . "</div>";
echo "<div class='col-xs-6'>" . $row['message'] . "</div>";

echo "</div>";
}
echo "</div>";

// Free result set

mysqli_free_result($result);

} else{
echo "No records matching your query were found.";
}
}
else{


echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


?>
