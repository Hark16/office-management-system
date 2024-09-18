
<!DOCTYPE html>
<html>
<head><title>

Forget Possword </title>

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

<h1> Forget Password </h1>
<div class="container">
<p> Enter your e-mail id which you used for creating account we will send you a mail</p></div>


<div class="container">

<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">


email :  
</div>

  <div class="col-xs-6">

<input type='email' name='email'/><br/>
</div></div>

<div class="row">
  <div class="col-xs-12">
<center>

<input type='submit' name='submit' value='send' />
</center></div></div>

</div>
</form>
</div>


<?php
include "databaseConnection.php";
session_start();

$email=$_POST['email'];

$a= RAND(111111,999999);


if(isset($_POST['submit'])){

ini_set("sendmail_from", "connection@myprabandhak.com");  

$to = $email;

$subject = "Confirmation mail ";

$message = "<h1>we welcome you in MyPrabandhak.com <h1> <p> this mail come from <a href='https://www.myprabandhak.com'> MyPrabandhak.com </a> because someone changing account password with useing this e-mail id,</p><br/><hr/> <p> if it was you then enter next PIN in Confirmation page to confirm your account , </p> <br/> <h5>PIN is : </h5> <b> ".$a." </b><br/><br/>  <br/> <p> Or if you are not creating any account so ignore this mail </p>";

$header = "From:connection@myprabandhak.com \r\n";
$header .= "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html;charset=UTF-8 \r\n";

$result = mail ($to,$subject,$message,$header);

if( $result == true ){

$_SESSION['email']= $email;
$_SESSION['a']= $a;


   header("Location: confirmpassword.php");

}

}
?>

</body>
</html>
