
<!DOCTYPE html>
<html>
<head><title>
confirm PIN
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


<h1> Confirmation Page </h1>

<div class="container">

<p>
we sent you a mail, so that we can verify you.
<br/>there is a six digit PIN in mail
<br/>enter it here
</p>
</div>

<div class="container">

<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">
PIN code : </div>
  <div class="col-xs-6">

<input type='number' name='num' /><br/>
</div></div>


<div class="row">
  <div class="col-xs-12">
<center>

<input type='submit' value='submit' name='submit1' />
</center> </div> </div>

</div>
</form>
</div>

<?php  

error_reporting(0);

session_start();

include "databaseConnection.php";

$a=$_SESSION['a'];


$email = $_SESSION['email'];


if(isset($_POST['submit1'])){
$b= $_POST['num'];

if($a==$b){

$_SESSION['email']= $email;

   header("Location: changepassword.php");
}
else{
echo"<h1>sorry you entered wrong number</h1>";

}
}


?>

</body>
</html>
