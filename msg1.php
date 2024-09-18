
<html>
<head><title><?php 
error_reporting(0);

session_start();


$username= $_SESSION['username'];
$firstname= $_SESSION['firstname'];


$cwln= ($username."_coworkerlist");

echo"your Message-Box";

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

<a href='profile.php' class='btn btn-primary'> go to profile</a><br/>
</div>
  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'> log out </a><br/>");

?>
</div></div></div>

<div class="container">
Your co workers 
</div>

<?php

include "databaseConnection.php";
error_reporting(0);


$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";

echo "<div class='row'>";
//echo "<th> number</th>";
echo "<div class='col-xs-3'> image </div>";

echo "<div class='col-xs-3'>co-worker name</div>";
echo "<div class='col-xs-3'> Message </div>";
echo "<div class='col-xs-2'> Unread </div>";
echo "<div class='col-xs-1'> Logged in </div>";

echo "</div>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];
$cousername= $row['cousername'];
$msgusername= ($username.$cousername);

$msgtable= ($username."_msg");
$sqlmsg = "SELECT * FROM $msgtable WHERE readmsg ='unread' and username= '$msgusername'";

$msgresult= mysqli_query($conn, $sqlmsg);
$unread= mysqli_num_rows($msgresult);
$coname= $row['coworkname'];

$log = "SELECT * FROM prabandh_USERS WHERE username= '$cousername' AND login= 'login'";

$logresult= mysqli_query($conn, $log);
$logged= mysqli_num_rows($logresult);

echo "<div>";
//echo "<td>" . $idnum. "</td>";

$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='col-xs-3'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";

echo "<div class='col-xs-3'>" .$coname. "</div>";

echo "<div class='col-xs-3'><a href='msg2.html?cousername=".$row['cousername']."&username=".$username."&firstname=".$firstname."'> Message </a>  </div>";
echo "<div class='col-xs-2'>" . $unread. " unread messages </div>";

if($logged==1){

$point= ("*");
echo "<div class='col-xs-1'>" . $point. " </div>";
}}
else{
$point= ("--");
echo "<div class='col-xs-1'>" . $point. " </div>";

}


echo "</div>";
}
echo "</div>";
// Free result set

mysqli_free_result($result);

} else{
echo "No records matching your query were found.";
}
}
else{

die();

echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>



</body>
</html>