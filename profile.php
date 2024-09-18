
<html><head>

<title>

<?php
error_reporting(0);
include "databaseConnection.php";

session_start();
$firstname= $_SESSION['firstname'];
$username= $_SESSION['username'];


echo($username." profile");
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

<a href='login.php' class='btn btn-primary'>click here for login page</a>
</div>

  <div class="col-xs-6">

<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'>log out </a>");

?>
</div> </div> </div> 

<h1>
<?php
echo("welcom ". $firstname);


?>
</h1>


<div class="container">

<form method='POST'>

<div class="container">


<?php
  $result = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$username'");
    
while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img class='img-responsive img-thumbnail' src='images/".$row['image']."' style='hight: 450px; width: 500px;'>";
      	echo "<p>".$row['image_name']."</p>";
      echo "</div>";


    }
  ?>

<input type='submit' value='update details & image' name='update'/>
</div>
  <div class='container'>

<input type='text' name='taskname' value=' '> work name</input><br/>

<input type='submit' name='submit' value='submit'></input>
<br/>
please use _ in place of space ...

</div>

  <div class='container'>
<input type='submit' name='worklist' value='worklist'></input>
</div>

  <div class='container'>

<input type='submit' name='coworklist' value='co workers list'></input>
</div>

  <div class='container'>
<input type='submit' value='MSG' name='msg'></input>

</div>
</form>
</div>

<?php

include "databaseConnection.php";
error_reporting(0);

if(isset($_POST['update'])){

$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;

   header("Location: update.php");

}

if(isset($_POST['submit'])){

$name=mysqli_real_escape_string($conn,$_POST['taskname']);
$table_name= $username."_".$name;


if (strpos($name, ' ') !== false) {

echo "<h1>please do not use space or write something </h1>";


$result = mysqli_query($conn,"SHOW TABLES LIKE '".$table_name."'");
if($result->num_rows == 1) {


echo"<h1>already created</h1>";
}}

else {

$table5 = "CREATE TABLE $table_name ( id INT(250) UNSIGNED PRIMARY KEY, task_name VARCHAR(200) NOT NULL UNIQUE, about VARCHAR(250) NOT NULL, public VARCHAR(10) NOT NULL, year INT(4), month INT(2), date INT(2), hour INT(2), minute INT(2), second INT(2), status VARCHAR(10), registor TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMp, created_firstname VARCHAR(40) NOT NULL, created_username VARCHAR(30) NOT NULL)";


mysqli_query($conn,$table5);
$wln= ($username."_worklist");

$inswork= "INSERT INTO $wln (workname, username, public) VALUES('$name', '$username', 'private')";

mysqli_query($conn, $inswork);

$cwln= ($username."_coworkerlist");

$sql = "SELECT * FROM $cwln WHERE status='accepted'";

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$friendusername= $row['cousername'];

$cohome= ($friendusername."_home");
$info= ('a worklist is created which is private, created by-->>');


$inshome= "INSERT INTO $cohome (info, username, firstname) VALUES('$info', '$username', '$firstname')";

mysqli_query($conn, $inshome);


}}}

}
}

if(isset($_POST['worklist'])){
$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;


   header("Location: worklist.php");

}

if(isset($_POST['coworklist'])){
$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;

   header("Location: coworkerlist.php");

}

if(isset($_POST['msg'])){
$_SESSION['username']= $username;
$_SESSION['firstname']= $firstname;

   header("Location: msg1.php");

}


?>
<div class="container">
Overview</div>


<?php
$home= ($username."_home");

$sql = "SELECT * FROM $home ORDER BY id DESC";

$del= "DELETE FROM $home WHERE id= 0";

mysqli_query($conn, $del);

if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){

echo "<div class='container'>";

while($row = mysqli_fetch_array($result)){
$idnum= $row['id'];


echo "<div class='container'>" . $idnum. "</div>";
echo "<div class='container'>" . $row['info'] . "</div>";
echo "<div class='container'>" . $row['firstname'] . "</div>";

$cousername1= $row['username'];
$result1 = mysqli_query($conn, "SELECT * FROM prabandh_USERS WHERE username= '$cousername1'");    
while ($row1 = mysqli_fetch_array($result1)){

echo "<div class='container'> <div id='img_div'><img class='img-responsive img-thumbnail' src='images/".$row1['image']."' style='hight: 100px; width: 150px;'> </div> </div>";


echo "<div class='container'>" . $row['sent_date'] . "</div>";

echo"<hr/>";
echo"<hr/>";


}}
echo "</div>";

// Free result set

mysqli_free_result($result);

} else{
echo "No records matching your query were found.";
}
}
else{

echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


?>



</body>
</html>

