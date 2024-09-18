
<html>
<head><title><?php 
error_reporting(0);

session_start();


$username= $_SESSION['username'];
$firstname= $_SESSION['firstname'];


$wln= ($username."_worklist");

echo"your worklist";

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

<a href='profile.php' class='btn btn-primary'>go to profile</a><br/>
</div>

  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'>log out </a><br/>");

?>
</div> </div> </div>


<?php

include "databaseConnection.php";
error_reporting(0);

$sql = "SELECT * FROM $wln";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];
$table_name= ($username."_".$row['workname']);

echo "<div class='container'>" . $idnum. "</div>";
echo "<div class='container'>" . $row['workname'] . "</div>";
echo "<div class='container'>" . $row['public'] . "</div>";


echo "<div class='container'><a href='task.php?table_name=".$table_name." & username=".$username."& workname=".$row['workname']."&firstname=".$firstname."'>Show</a> </div>";

echo "<div class='container'><a href='deleteWorklist.php?idnum=".$idnum."& username=".$username."& workname=".$row['workname']."&name=".$row['workname'] ."&firstname=".$firstname."'>delete</a> </div>";

echo "<div class='container'><a href='publicworklist.php?idnum=".$idnum."&wln=".$wln."&username=".$username."&name=".$row['workname'] ."&firstname=".$firstname."'>click to PUBLIC</a> </div>";

echo "<div class='container'><a href='privateworklist.php?idnum=".$idnum."&wln=".$wln."&username=".$username."&name=".$row['workname'] ."&firstname=".$firstname."'>click to PRIVATE </a> </div>";

echo"<hr/>";
}
echo "</div>";
// Free result set

mysqli_free_result($result);

} else{
echo "<h1>No records matching your query were found.</h1>";
}
}
else{

echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

?>

</body>
</html>