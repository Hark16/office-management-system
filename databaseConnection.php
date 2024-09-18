
<?php


$dbservername="localhost";
$dbuser="u526284483_harish";
$dbpass=""

$dbname=""


$conn=mysqli_connect($dbservername,$dbuser,$dbpass,$dbname);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

