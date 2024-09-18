
<html><head>

<title>

<?php
error_reporting(0);
include "databaseConnection.php";
session_start();
$firstname= $_SESSION['firstname'];
$username= $_SESSION['username'];


echo($username." Update Details");
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

<a href='profile.php' class='btn btn-primary'>click here for profile page</a>
</div>

  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'>log out </a>");

?>
</div> </div> </div> 
<hr/>
<form method='POST'>
<div class="container">
<div class="row">
  <div class="col-xs-4">
<input type='submit' value='update image' name='image' />

</div>
  <div class="col-xs-4">
<input type='submit' value='update password' name='password' />

</div>
  <div class="col-xs-4">
<input type='submit' value='update details' name='details' />

</div>
</div> </div> </form>


<?php

$sql = "SELECT * FROM prabandh_USERS WHERE username= '$username' ";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

echo"<h1> Your Details </h1>";
echo"<br/>your username : ".$username." <br/>";

echo("Name : ".$row['firstname']." ".$row['lastname']."<br/>");
echo("E-mail : ".$row['email']."<br/>");
echo("City : ".$row['cityname']."<br/>");
echo("Company/College/School : ".$row['companyname']."<br/>");
echo("Class/Department/Grade : ".$row['classname']."<br/>");

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


if(isset($_POST['image'])){

$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;

   header("Location: updateimage.php");

}


if(isset($_POST['password'])){

$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;

   header("Location: updatepassword.php");

}


if(isset($_POST['details'])){

$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;

   header("Location: updatedetails.php");

}


?>

</body>
</html>
