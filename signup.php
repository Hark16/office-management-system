
<!DOCTYPE html>
<html>
<head><title>

member signup </title>

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

<h1>Fill Your Details </h1>

<div class="container">

<p>we welcome you in MyPrabandhak.com here you can create your account..</p>
<br/><p>For that you need to fill all fields</p>
</div>

<div class="container">
<form method='POST'>

<div class="container">
<div class="row">
  <div class="col-xs-6">

E-mail : 
</div>

  <div class="col-xs-6">

<input type='email' name= 'email' required> </input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

Unique Username : 
</div>
  <div class="col-xs-6">

<input type='text' name= 'username' value=' ' required> </input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

First name : 
</div>
  <div class="col-xs-6">

<input type='text' name= 'firstname' required></input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

Last name : 
</div>
  <div class="col-xs-6">

<input type='text' name='lastname'></input><br/>
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

Password : 
</div>
  <div class="col-xs-6">

<input type='password' name= 'password'> </input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

reenter Password : 
</div>
  <div class="col-xs-6">

<input type='password' name= 'password1'> </input><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

memory question: 
</div>
  <div class="col-xs-6">

<input name='forgetquestion' /><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-6">

memory answer: 
</div>
  <div class="col-xs-6">

<input name='forgetanswer' /><br/>

</div>
</div>
<div class="row">

  <div class="col-xs-12">

 <input type='checkbox' name='agree' id='agree'> i agree to accept terms and conditions of this site.</input><br/>
<a href='termsandconditions.html'> Terms and Conditions </a><br/>
</div>
</div>
<div class="row">

  <div class="col-xs-12">
<center>

<input type='submit' name= 'submit' value='submit' class='btn btn-primary'></input><br/>
</center></div>
</div></div>

</form>
</div>

<?php

session_start();

error_reporting(0);

include "databaseConnection.php";
$user= $_POST['username'];
$email=$_POST['email'];

$pass= $_POST['password'];
$pass1= $_POST['password1'];

$sel= "SELECT username FROM prabandh_USERS WHERE username='$user'";

$result = mysqli_query($conn,$sel);
$total=mysqli_num_rows($result);

if(isset($_POST['submit'])){

if (strpos($user, ' ') !== false) {
echo "please do not use space or write something ";

}


elseif ($total===0){

if($pass===$pass1){
if($_POST['agree']){


$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$cn=$_POST['cityname'];
$con=$_POST['companyname'];
$cln=$_POST['classname'];
$fq=$_POST['forgetquestion'];
$fa=$_POST['forgetanswer'];


$ins= "INSERT INTO prabandh_USERS (firstname, lastname, email, password, username, cityname, companyname, classname, login, forgetquestion, forgetanswer, confirm) VALUES('$fn', '$ln', '$email', '$pass', '$user', '$cn', '$con', '$cln', 'logout', '$fq', '$fa', 'not_confirmed')";

mysqli_query($conn, $ins);


$worklistname= ($user."_worklist");
$sqlwork = "CREATE TABLE $worklistname (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, workname VARCHAR(30) NOT NULL, username VARCHAR(30) NOT NULL, public VARCHAR(10) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMp)";
mysqli_query($conn, $sqlwork);



$inswork= "INSERT INTO $worklistname (workname, username, public) VALUES('coworkertask', '$user', 'private')";

mysqli_query($conn, $inswork);

$table_name= ($user."_coworkertask");

$table5 = "CREATE TABLE $table_name (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, task_name VARCHAR(200) NOT NULL UNIQUE, about VARCHAR(250) NOT NULL, public VARCHAR(10) NOT NULL, year INT(4), month INT(2), date INT(2), hour INT(2), minute INT(2), second INT(2), status VARCHAR(10), registor TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMp, created_firstname VARCHAR(40) NOT NULL, created_username VARCHAR(30) NOT NULL)";

mysqli_query($conn,$table5);



$coworkerlistname= ($user."_coworkerlist");
$sqlcowork = "CREATE TABLE $coworkerlistname (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, coworkname VARCHAR(30) NOT NULL, cousername VARCHAR(30) NOT NULL, status VARCHAR(10), request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMp)";
mysqli_query($conn, $sqlcowork);

$msgtable= ($user."_msg");
$sqlmsg = "CREATE TABLE $msgtable (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, message TEXT(50000) NOT NULL, username VARCHAR(30) NOT NULL, firstname VARCHAR(10), sent_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMp, readmsg VARCHAR(30) NOT NULL)";

mysqli_query($conn, $sqlmsg);

$hometable= ($user."_home");

$sqlhome = "CREATE TABLE $hometable (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, info TEXT(50000) NOT NULL, username VARCHAR(30) NOT NULL, firstname VARCHAR(10), sent_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMp)";

mysqli_query($conn, $sqlhome);


mysqli_close($conn);
$_SESSION['wln']= $worklistname;
$_SESSION['cwln']= $coworkerlistname;




ini_set("sendmail_from", "connection@myprabandhak.com");  

//       $to = "baba15041990@gmail.com";
//change receiver address  

$to = $email;

$subject = "Confirmation mail ";

$message = "<h1> welcom in MyPrabandhak </h1> <p> someone is creating account in myprabandhak.com if it was you then click below linc to confirm your email id </p> <br/><hr/> <h3> <a href='https://www.myprabandhak.com/confirmation.php?username=".$user."'> confirm here </a> </h3> <br/><br/> <p> if it was not you then just ignore this mail, </p>";

$header = "From:connection@myprabandhak.com \r\n";
$header .= "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html;charset=UTF-8 \r\n";

$result = mail ($to,$subject,$message,$header);

if( $result == true ){
$_SESSION['email']= $email;

   header("Location: confirmmail.php");

}

else{

echo "Sorry, unable to send mail...";  

}



}
else{echo"first agree with terms and conditions ";}

}
else{echo"password not matched";}

}
else{

echo"username is taken, please Try Again with unique username..";

}

}


?>


</body>
</html>
