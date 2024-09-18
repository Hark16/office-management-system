
<!DOCTYPE html>
<html>
<head><title>

Login Page 
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

<h1>Welcom Member in Mobile MyPrabandhak </h1>
<div class="container">

<p> Fill email id and password to login your account...</p>
</div>

<div class="container">

<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">
email id : </div>

  <div class="col-xs-6">

<input type='email' placeholder='email' name='username' required/><br/>
</div>
</div>
<div class="row">
  <div class="col-xs-6">
Password : </div>

  <div class="col-xs-6">

<input type='password' name='password' required/><br/>
</div></div>
<div class="row">
  <div class="col-xs-12">
<center>

<input type='submit' name='submit' value='submit' class='btn btn-success'/>
</center>
</div></div>
</div>

</form>
</div>

<div class="container">


<?php

error_reporting(0);


if (isset($_POST['submit']))
{

session_start();
$wln=$_SESSION['wln'];
include "databaseConnection.php";

error_reporting(0);

$password = $_POST['password'];
$username = $_POST['username'];



$sql= "SELECT * FROM prabandh_USERS WHERE email='$username' and password='$password' and confirm = 'confirmed' ";

$result = mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
 
if ($total===1){
$_SESSION['firstname']= $row['firstname'];
$_SESSION['username']= $row['username'];


$pub= "UPDATE prabandh_USERS SET login='login' WHERE email= '$username' ";

mysqli_query($conn, $pub);

   header("Location: profile.php");

}
else
{
?>
<script>alert("login unsuccessfull, try again")
</script>
<?php

}

}
?>

</div>

<div class="container">
<center><a href='forgetpassword.php'>click here if you forget password</a>
</center>
</div>

<div class="container">
<center>
<a href='signup.php'>
Click Here For Create New Account
</a>
</center>


</div>
</body>
</html>
