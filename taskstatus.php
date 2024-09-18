
<html>
<head><title><?php 
error_reporting(0);

session_start();

$firstname= $_GET['firstname'];
$username= $_GET['username'];

$task_name=  $_GET['task_name'];
$taskname= $_GET['taskname'];
include "databaseConnection.php";
error_reporting(0);


$table_name= $_GET['table_name'];
$idnum= $_GET['idnum'];


echo("Status of ".$task_name);
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
<?php
echo "<a href='task.php?table_name=".$table_name." & username=".$username."& workname=".$taskname."' class='btn btn-primary'>return to work area </a>";
?>
</div>

  <div class="col-xs-6">
<?php

echo("<br/><a href='logout.php?username=".$username."' class='btn btn-danger'>log out </a><br/>");

?>
</div> </div> </div> 

<div class="container">

<div class="container">
<div class="row">
  <div class="col-xs-4">

<form method='POST'>

<button name='com' class='btn btn-success'>click here if your task is completed </button>
</form>

  <div class="col-xs-4">
<form method='POST'>
<button name='pub' class='btn btn-primary'>click here to Public your task </button>
</form>

  <div class="col-xs-4">
<form method='POST'>
<button name='pri' class='btn btn-danger'>click here to Private your task </button>
</form>
</div> </div> </div>



<div class="container">

<?php
if(isset($_POST['com'])){
$upd= "UPDATE $table_name SET status='completed' WHERE id= '$idnum' ";

mysqli_query($conn, $upd);

}
if(isset($_POST['pub'])){
$pub= "UPDATE $table_name SET public='public' WHERE id= '$idnum' ";

mysqli_query($conn, $pub);

   header("Location: taskinhome.php?firstname=$firstname&username=$username&taskname=$taskname&task_name=$task_name&table_name=$table_name&idnum=$idnum");

}
if(isset($_POST['pri'])){
$pri= "UPDATE $table_name SET public='private' WHERE id= '$idnum' ";

mysqli_query($conn, $pri);

}



$sql = "SELECT * FROM $table_name WHERE id= $idnum";



$del= "DELETE FROM $table_name WHERE id= 0";

mysqli_query($conn, $del);


if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

echo("<br/><hr/>your task number is ".$idnum."<br/>");
echo("your task name is ". $row['task_name']."<br/>");
echo("About your task is ". $row['about']."<br/>");
echo("your task will start ". $row['year']."-". $row['month']."-". $row['date']."==". $row['hour']." : ". $row['minute']." : ". $row['second']."<br/>");
echo("your task status is ".$row['status']."<br/>");
echo("your task is ".$row['public']."<br/>");

echo("your task registored on  ". $row['registor']."<br/>");


echo("this task is created by   ". $row['created_firstname']."<br/>");



        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    
} else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



?>
</div>

<div class="container">

<div id="clockbox">
</div>
</div>
<div class="container">

<form method='POST'>
enter to check remaining time of your task 
<br/>
<div class="container">

<div class="row">
  <div class="col-xs-2">

<input type='number' value='' name='y'>enter year</input><br/>
year
</div>
  <div class="col-xs-2">

<input type='number' value='' name='m1'>enter month</input><br/>
month
</div>
  <div class="col-xs-2">

<input type='number' value='' name='dt'>enter date</input><br/>
date
</div>
  <div class="col-xs-2">

<input type='number' value='' name='hr'>enter hour</input><br/>
hour
</div>

  <div class="col-xs-2">
<input type='number' value='' name='min'>enter minutes</input><br/>
min</div>
  <div class="col-xs-2">

<input type='number' value='' name='sec'>enter second</input><br/>
sec</div>
</div>
<div class="row">
  <div class="col-xs-12">
<center>
<button name='submit' class='btn btn-primary'>sub </button>
</center> </div> </div> </div>

</form>
</div>

<?php


if(isset($_POST['submit'])){
$y= $_POST['y'];
$n= $_POST['m1'];
$m1 = $n-1;

$dt= $_POST['dt'];
$hr= $_POST['hr'];
$min= $_POST['min'];
$sec= $_POST['sec'];



}

?>



<script type="text/javascript">


var CDown = function() {
this.state=0;

this.counts=[];

this.interval=null;// setInterval object
}

CDown.prototype = {
init: function(){
this.state=1;
var self=this;
this.interval=window.setInterval(function(){self.tick();}, 1000);
},
add: function(date,id){
this.counts.push({d:date,id:id});
this.tick();
if(this.state==0) this.init();
},
expire: function(idxs){

for(var x in idxs) {
this.display(this.counts[idxs[x]], "Now!");
alert("time over");


this.counts.splice(idxs[x], 1);
}
},
format: function(r){
var pre='',post='',divide=', ',
out="";
if(r.d != 0){out += pre+r.d +" "+((r.d==1)?"day":"days")+post+divide;}
if(r.h != 0){out += pre+r.h +" "+((r.h==1)?"hour":"hours")+post+divide;}
out += pre+r.m +" "+((r.m==1)?"min":"mins")+post+divide;
out += pre+r.s +" "+((r.s==1)?"sec":"secs")+post+divide;

return out.substr(0,out.length-divide.length);
},
math: function(work){
var	y=w=d=h=m=s=ms=0;

ms=(""+((work%1000)+1000)).substr(1,3);
work=Math.floor(work/1000);//kill the "milliseconds" so just secs

y=Math.floor(work/31536000);//years (no leapyear support)
w=Math.floor(work/604800);//weeks
d=Math.floor(work/86400);//days
work=work%86400;

h=Math.floor(work/3600);//hours
work=work%3600;

m=Math.floor(work/60);//minutes
work=work%60;

s=Math.floor(work);//seconds

return {y:y,w:w,d:d,h:h,m:m,s:s,ms:ms};
},
tick: function(){
var now=(new Date()).getTime(),
expired=[],cnt=0,amount=0;

if(this.counts)
for(var idx=0,n=this.counts.length; idx<n; ++idx){
cnt=this.counts[idx];
amount=cnt.d.getTime()-now;//calc milliseconds between dates

// if time is already past
if(amount<0){
expired.push(idx);
}
// date is still good
else{
this.display(cnt, this.format(this.math(amount)));
}
}

// deal with any expired
if(expired.length>0) this.expire(expired);

// if no active counts, stop updating
if(this.counts.length==0) window.clearTimeout(this.interval);

},
display: function(cnt,msg){
document.getElementById(cnt.id).innerHTML=msg;
}
};

window.onload=function(){
var cdown = new CDown();

var y= <?php echo($y); ?>;
var m1= <?php echo($m1); ?>;
var dt= <?php echo($dt); ?>;
var hr= <?php echo($hr); ?>;
var min= <?php echo($min); ?>;
var sec= <?php echo($sec); ?>;



var m3=new Date(y,m1,dt,hr,min,sec);



cdown.add(m3, "countbox1");


};


var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){

var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();

var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";

document.getElementById('clockbox').innerHTML= "current time ...<br/>"+clocktext;

}

GetClock();
setInterval(GetClock,1000);

</script>

<div class="container">

Your task should start after 
<div id="countbox1"></div>
If you have will to do it....
</div>


</body></html>
