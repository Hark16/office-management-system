
<html><head>

<title>

<?php
error_reporting(0);
include "databaseConnection.php";
session_start();

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

<h1> change password</h1>

<form method='POST'>
<div class="container">
<div class="row">
  <div class="col-xs-6">


new password<br/>

<input type='text' name='pass'/><br/>
</div>
  <div class="col-xs-6">


confirm password<br/>

<input type='text' name='pass1'/>
</div> </div>

<div class='row'>
  <div class="col-xs-12">

<input type='submit' name='submit' value='submit' />
</div> </div> </div>

</form>

<?php

if(isset($_POST['submit'])){
$pass= $_POST['pass'];
$pass1 = $_POST['pass1'];

if($pass==$pass1){
$username= $_SESSION['username'];

$upd= "UPDATE prabandh_USERS SET password = '$pass' WHERE username = '$username' ";

mysqli_query($conn, $upd);

}



}
?>

<a href='login.php'>login page</a>
