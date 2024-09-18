
<html><head>

<title>

<?php
error_reporting(0);
include "databaseConnection.php";
session_start();

$username= $_SESSION['username'];


echo($username." Update A/C details ");
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

First name : 
</div>
  <div class="col-xs-6">

<input type='text' name= 'fname' required></input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

Last name : 
</div>
  <div class="col-xs-6">

<input type='text' name='lname'></input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

City name : 
</div>
  <div class="col-xs-6">

<input type='text' name='cityname'></input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

Company,College or School name : 
</div>
  <div class="col-xs-6">

<input type='text' name='companyname'></input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

Department,Class or Grade name : 
</div>
  <div class="col-xs-6">

<input type='text' name='classname'></input><br/>
</div>
</div>

<div class="row">

  <div class="col-xs-6">

memory question: 
</div>
  <div class="col-xs-6">

<input name='question' /><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

memory answer: 
</div>
  <div class="col-xs-6">

<input name='answer' /><br/>

</div>
</div>

<div class="row">

  <div class="col-xs-12">
<center>

<input type='submit' name= 'submit' value='submit' class='btn btn-primary'></input><br/>
</center></div>
</div></div>

</form>



<?php

if(isset($_POST['submit'])){
$fname= $_POST['fname'];
$lname = $_POST['lname'];
$cityname = $_POST['city'];
$companyname = $_POST['company'];
$classname = $_POST['class'];
$fq = $_POST['question'];
$fa = $_POST['answer'];


$username= $_SESSION['username'];

$upd= "UPDATE prabandh_USERS SET firstname= '$fname' AND lastname='$lname' AND cityname='$cityname' AND companyname='$companyname' AND classname='$classname' AND forgetquestion='$fq' AND forgetanswer='$fa' WHERE username = '$username' ";

mysqli_query($conn, $upd);
echo"updated successfully ";

}
else{
echo"not done ";

}
?>

<a href='login.php'>login page</a>
