
<html>
<head><title><?php 
error_reporting(0);

session_start();


$susername= "co-worker ";
$username= $_GET['username'];

$task_name=  $_GET['task_name'];
$taskname= $_GET['taskname'];
include "databaseConnection.php";

error_reporting(0);

$table_name= $_GET['table_name'];
$idnum= $_GET['idnum'];


echo("Status of ".$task_name);
?>
</title>


<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="mystyle.css">

</head>
<body>

<div class="container">
<div class="row">
  <div class="col-xs-6">

<a href='coworkerlist.php' class='btn btn-primary'> go to co-workers list </a><br/>
</div>
  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'> log out </a><br/>");

?>
</div></div></div>


<?php

$sql = "SELECT * FROM $table_name WHERE id= $idnum";



$del= "DELETE FROM $table_name WHERE id= 0";

mysqli_query($conn, $del);


if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

echo"<div class='container'>";

echo("<br/><hr/>".$susername." task number is ".$idnum."<br/>");
echo($susername. " task name is ". $row['task_name']."<br/>");
echo("About ".$susername." task is ". $row['about']."<br/>");
echo($susername." task will start ". $row['year']."-". $row['month']."-". $row['date']."==". $row['hour']." : ". $row['minute']." : ". $row['second']."<br/>");
echo($susername." task status is ".$row['status']."<br/>");
echo($susername." task is ".$row['public']."<br/>");

echo($susername. " task registored on  ". $row['registor']."<br/>");
echo"</div>";

        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    
} else{
        echo "No records matching your query were found.";
    }
} else{
die();

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



?>



</body></html>
