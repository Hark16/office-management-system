
<html><head>

<title>

<?php
error_reporting(0);
include "databaseConnection.php";
session_start();
$firstname= $_SESSION['firstname'];
$username= $_SESSION['username'];


echo($username." Update Password");
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
  <div class="col-xs-6">
enter old password : 
</div>

  <div class="col-xs-6">
<input type='password' name='oldpassword'/>
</div> </div> 

<div class="row">
  <div class="col-xs-12">
<input type='submit' value='submit' name='submit' />
</div> </div>
</div>
</form>

<?php

if(isset($_POST['submit'])){
$oldpassword= $_POST['oldpassword'];

$sql= "SELECT * FROM prabandh_USERS WHERE username= '$username'";
$result= mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)){

if($oldpassword== $row['password']){
$_SESSION['username']= $username;

   header("Location: createpassword.php");
}else{

echo"wrong attempe ";
}}
}

?>

</body>
</html>
