<?php
error_reporting(0);

session_start();

$workname= $_GET['taskname'];

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



$cwln= ($username."_coworkerlist");



?>


<!DOCTYPE html>
<html>
<head><title>

SEND
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

<?php

echo('<a href="task.php?username='.$username.'&firstname='.$firstname.'&workname='.$workname.'" class="btn btn-primary">back</a>');

?>
</div>
  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'>log out </a><br/>");

?>
</div> </div> </div>

<?php

include "databaseConnection.php";
error_reporting(0);

$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";


while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];

echo "<div class='container'>" . $idnum. "</div>";

$cousername1= $row['cousername'];
$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername1'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='container'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";

echo "<div class='container'>" . $row['coworkname'] . "</div>";
echo "<div class='container'><a href='coprofile.php?username=".$username."&cousername=".$row['cousername']."'>go to profile </a>  </div>";
                echo "<div class='container'><a href='sendtask1.php?workname=".$workname."&username=".$username."&firstname=".$firstname."&thetask=".$thetask."&about=".$about."&year=".$year."&month=".$month."&date=".$date."&hour=".$hour."&minute=".$minute."&second=".$second."&cousername=".$row['cousername']."&coworkname=".$row['coworkname']."'>send </a> </div>";


echo "<hr/>";
}}
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

</body>
</html>
