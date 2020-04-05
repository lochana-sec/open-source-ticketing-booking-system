<?php

if(!isset($_SESSION)){
	session_start();
		  }
require_once("include/dbconnection_inc.php");

$pid=$_REQUEST['sid'];
$sid=$_SESSION['sid'];
$session_id=$_SESSION['session_id'];
$total=$_SESSION['total'];
$bdate=date("Y-m-d");
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND 
ts.time_slot_id=s.time_slot_id  
AND schedule_id='$sid'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
include("common/phpqrcode/phpqrcode.php");
$pm="paypal";

$drama_id=$row['drama_id'];
$drama_name=$row['drama_name'];
$time_slot_id=$row['time_slot_id'];
$description=$row['description'];
$date=$row['date'];

//To get ticket prices
$sqlb="SELECT * FROM booking
WHERE session_id='$session_id'";
$resultb=mysql_query($sqlb);

//To get ticket prices
$sqlpp="SELECT * FROM payment 
WHERE pay_id='$pid'";
$resultpp=mysql_query($sqlpp);
$rowp=mysql_fetch_array($resultpp);

$sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
$resultd=mysql_query($sqld);
$dirarray=array();
while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}


$f="qr/".$pid.".png";
$str="Reference No: ".$pid."\n Drama Name ".$drama_name."\n Date ".$date."\n Time ".$description;
QRcode::png('code data text', $f); // creates file 
QRcode::png($str); // creates code image and outputs it directly into browser

?>