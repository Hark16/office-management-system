
<!DOCTYPE html>
<html>
<head><title>

Confirmation Page 
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
<br/> click on linc which is on mail
<br/> 
<br/>if there is no mail in your inbox then search it in other folder like spam or pramotions etc
<br/> wait some time....
</p>
</div>
<?php
session_start();

$email= $_SESSION['email'];
echo"<h1>email is ".$email." </h1>";


?>

<div class="container">
<a href='login.php'>login Page</a></div>

</body>
</html>
