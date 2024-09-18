
<html>
<head><title><?php 
error_reporting(0);

session_start();


$username= $_SESSION['username'];
$firstname= $_SESSION['firstname'];


$cwln= ($username."_coworkerlist");

echo"your Co-Workers";

?>
</title>

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

Request sent to be your co worker 
</div>


<?php

include "databaseConnection.php";

error_reporting(0);

$sql1= "SELECT * FROM $cwln WHERE status='requestsen'";

if($result = mysqli_query($conn, $sql1)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";

echo "<div class='row'>";

echo "  <div class='col-xs-3'>number</div>";
echo "  <div class='col-xs-3'> image </div>";

echo "<div class='col-xs-6'>co-worker name</div>";

echo "</div>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];



echo "<div class='row'>";
echo "<div class='col-xs-6'>" . $idnum. "</div>";

$cousername1= $row['cousername'];
$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername1'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='col-xs-3'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";

echo "<div class='col-xs-6'>" . $row['coworkname'] . "</div>";


echo "</div>";
}}
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


<div class="container">
Request to be your co worker 
</div>

<?php

include "databaseConnection.php";

$sql1= "SELECT * FROM $cwln WHERE status='requested'";

if($result = mysqli_query($conn, $sql1)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";
echo "<div class='row'>";

echo "<div class='col-xs-1'> number</div>";
echo "<div class='col-xs-3'> image </div>";

echo "<div class='col-xs-2'>co-worker name</div>";
echo "<div class='col-xs-2'> accept </div>";
echo "<div class='col-xs-2'>Reject  </div>";
echo "<div class='col-xs-2'>profile </div>";

echo "</div>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];

echo "<div class='row'>";

echo "<div class='col-xs-1'>" . $idnum. "</div>";

$cousername1= $row['cousername'];
$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername1'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='col-xs-3'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";

echo "<div class='col-xs-2'>" . $row['coworkname'] . "</div>";
echo "<div class='col-xs-2'><a href='accept.php?cwln=".$cwln."&idnum=".$idnum."&username=".$username."&cousername=".$row['cousername']."&firstname=".$firstname."'> accept  </a>  </div>";
echo "<div class='col-xs-2'><a href='reject.php?cwln=".$cwln."&idnum=".$idnum."&username=".$username."&cousername=".$row['cousername']."&firstname=".$firstname."'> reject </a>  </div>";
echo "<div class='col-xs-2'><a href='coprofile.php?username=".$username."&cousername=".$row['cousername']."'>go to profile </a>  </div>";

echo "</div>";
}}
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


<div class='container'>
Your co workers 
</div>

<?php

include "databaseConnection.php";

$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";
echo "<div class='row'>";

echo "<div class='col-xs-1'> number</div>";
echo "<div class='col-xs-3'> image</div>";

echo "<div class='col-xs-3'>co-worker name</div>";
echo "<div class='col-xs-3'>go to profile </div>";
echo "<div class='col-xs-2'>remove </div>";
echo "</div>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];



echo "<div class='row'>";
echo "<div class='col-xs-1'>" . $idnum. "</div>";

$cousername1= $row['cousername'];
$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername1'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='col-xs-3'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";

echo "<div class='col-xs-3'>" . $row['coworkname'] . "</div>";

echo "<div class='col-xs-3'><a href='coprofile.php?username=".$username."&cousername=".$row['cousername']."'>go to profile </a>  </div>";
echo "<div class='col-xs-2'><a href='reject.php?cwln=".$cwln."&idnum=".$idnum."&username=".$username."&cousername=".$row['cousername']."&firstname=".$firstname."'> reject </a>  </div>";

echo "</div>";
}}
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

<div class='container'>

Suggested co workers
</div>
<div class='container'>
<form method='POST'>
<div class='container'>
<div class='row'>
<div class='col-xs-6'>

<input name='s'></input>
</div>
<div class='col-xs-6'>

<input name='b' value='search' type='submit' class='btn btn-success'></input>
</div></div></div>

</form>
</div>

<?php

if(isset($_POST['b'])){
include "databaseConnection.php";
$s= $_POST['s'];

$sql = "SELECT * FROM prabandh_USERS WHERE firstname='$s' OR cityname='$s' OR companyname='$s' OR classname='$s'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";
echo "<div class='row'>";

echo "<div class='col-xs-1'> number</div>";
echo "<div class='col-xs-3'> image </div>";

echo "<div class='col-xs-3'>co-worker name</div>";
echo "<div class='col-xs-2'>Send Request  </div>";
echo "<div class='col-xs-3'>Go to Profile   </div>";

echo "</div>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];



echo "<div class='row'>";
echo "<div class='col-xs-1'>" . $idnum. "</div>";

$cousername1= $row['username'];
$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername1'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='col-xs-3'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";

echo "<div class='col-xs-3'>" . $row['firstname'] . "</div>";
echo "<div class='col-xs-2'><a href='request.php?name=".$firstname."&username=".$username."&fusername=".$row['username']."&fname=".$row['firstname']."'>Send Request  </a>  </div>";
echo "<div class='col-xs-3'><a href='coface.php?cousername=".$row['username']."'>Go to Profile   </a>  </div>";


echo "</div>";
}}
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
}
?>

</body>
</html>