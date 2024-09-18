
<html>
<head><title><?php 
error_reporting(0);

session_start();

$firstname= $_SESSION['firstname'];
$username= $_SESSION['username'] = $_GET['username'];

$taskname= $_SESSION['taskname']= $_GET['workname'];
$table_name= ($username."_".$taskname);


echo("working on ".$taskname);
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



<h1><?php

echo("welcom ". $firstname."<br/>");
echo("your work name is ". $taskname);

 ?> </h1>

<div class="container">

<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">

Unique Number of your Task
</div>

  <div class="col-xs-6">

<input type='number' name='id' ></input><br/>
</div> </div> 


<div class="container">
<input type='text' name='thetask'> name of task </input><br/>
name of task 
</div>

<div class="container">

<input type='text' name='about' value=''>  task </input><br/>
about your task 
</div>


<div class="container">

<input name='year' type='number'>year</input>
</div>
<div class="container">

<input name='month' type='number'>month</input>
</div>
<div class="container">

<input type='number' name='date'>date</input>
</div>
<div class="container">

<input type='number' name='hour'>hour</input>
</div>
<div class="container">

<input type='number' name='minute'>minute</input>
</div>
<div class="container">

<input type='number' name='second'>second</input>

 </div>
<div class="row">
  <div class="col-xs-12">
<center>

<input type='submit' value='show' name='submit'></input>
</center> </div> </div> </div> 

</form>
</div>


<?php


include "databaseConnection.php";
error_reporting(0);


if(isset($_POST['submit'])){
$id= $_POST['id'];

$thetask= $_POST['thetask'];
$about= $_POST['about'];
$year= $_POST['year'];
$month= $_POST['month'];
$date= $_POST['date'];
$hour= $_POST['hour'];
$minute= $_POST['minute'];
$second= $_POST['second'];


$ins= "INSERT INTO $table_name (id, task_name, about, year, month, date, hour, minute, second, status, public, created_firstname, created_username) VALUES('$id', '$thetask', '$about', '$year', '$month', '$date', '$hour', '$minute', '$second', 'uncompleted', 'private', '$firstname', '$username')";

mysqli_query($conn, $ins);


}


$sql = "SELECT * FROM $table_name ORDER BY id DESC";


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


                echo "<div class='container'><a href='taskstatus.php?firstname=".$firstname."&task_name=".$row['task_name']."&username=".$username."&table_name=".$table_name."&idnum=".$idnum."&taskname=".$taskname."'>Status </a> </div>";
                echo "<div class='container'><a href='delete.php?idnum=".$idnum."& table_name=".$table_name."& username=".$username."& taskname=".$taskname."'>delete</a> </div>";
                echo "<div class='container'><a href='sendtask.php?taskname=".$taskname."&username=".$username."&firstname=".$firstname."&thetask=".$thetask."&about=".$about."&year=".$year."&month=".$month."&date=".$date."&hour=".$hour."&minute=".$minute."&second=".$second."'>send </a> </div>";
echo"<hr/>";

        }
        echo "</div>";
        // Free result set
        mysqli_free_result($result);
    
} else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



?>

</body>
</html>
