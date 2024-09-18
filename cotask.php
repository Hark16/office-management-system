
<html>
<head><title><?php 
error_reporting(0);

session_start();

$username= $_GET['username'];

$cousername= $_GET['cousername'];

$taskname= $_GET['workname'];
$table_name= $_GET['table_name'];
;


echo("watching on ".$taskname);
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


<h1><?php


echo("co-worker work name is ". $taskname);

 ?> </h1>



<?php


include "databaseConnection.php";
error_reporting(0);

$sql = "SELECT * FROM $table_name WHERE public= 'public' ORDER BY id DESC";


$del= "DELETE FROM $table_name WHERE id= 0";

mysqli_query($conn, $del);

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        echo "<div class='container'>";


        while($row = mysqli_fetch_array($result)){
                $idnum= $row['id'];


                echo "<div class='container'>" . $idnum. "</div>";
                echo "<div class='container'>" . $row['task_name'] . "</div>";
                echo "<div class='container'>" . $row['status'] . "</div>";
                echo "<div class='container'>" . $row['public'] . "</div>";
                echo "<div class='container'><a href='cotaskstatus.php?username=".$username."&task_name=".$row['task_name']."&table_name=".$table_name."&idnum=".$idnum."&taskname=".$taskname."'>Status </a> </div>";

            echo "<hr/>";
        }
        echo "</div>";
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

</body>
</html>