
<html>
<head><title><?php 

include "databaseConnection.php";
error_reporting(0);

session_start();


$cousername= $_GET['cousername'];


echo$cousername." profile";

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

<a href='coworkerlist.php' class='btn btn-primary'> go to co-workers list</a><br/>
</div>

  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'> log out </a><br/>");

?>
</div> </div> </div> 

<hr/>

<div class="container">

<?php

  $result = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername'");
    
while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img class='img-responsive img-thumbnail' src='images/".$row['image']."' style='hight: 450px; width: 500px;'>";
      	echo "<p>".$row['image_name']."</p>";
      echo "</div>";

    }
  ?>

</div>

<hr/>

<?php
$sql = "SELECT * FROM prabandh_USERS WHERE username= '$cousername' ";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

echo"<div class='container'>";

echo("Name : ".$row['firstname']." ".$row['lastname']."<br/>");
echo("E-mail : ".$row['email']."<br/>");
echo("City : ".$row['cityname']."<br/>");
echo("Company/College/School : ".$row['companyname']."<br/>");
echo("Class/Department/Grade : ".$row['classname']."<br/>");
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


</body>
</html>