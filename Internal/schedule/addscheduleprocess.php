<?php 
session_start(); //to start sesstion
require_once("../include/dbconnection_inc.php");

$sdate=$_POST['sdate'];
$stime=$_POST['stime'];
$dname=$_POST['dname'];
$gaprice=$_POST['gaprice'];
$gcprice=$_POST['gcprice'];
$baprice=$_POST['baprice'];
$bcprice=$_POST['bcprice'];

foreach($stime as $e){
$sql="INSERT INTO schedule 
VALUES('','$dname','$sdate','$e','Yes')";
mysql_query($sql);
$sid=mysql_insert_id();

//To add prices
$sqlga="INSERT INTO ticket_price 
VALUES('','$sid','Gallery','Adult','$gaprice')";
mysql_query($sqlga);

$sqlgc="INSERT INTO ticket_price 
VALUES('','$sid','Gallery','Child','$gcprice')";
mysql_query($sqlgc);

$sqlba="INSERT INTO ticket_price 
VALUES('','$sid','Balcony','Adult','$baprice')";
mysql_query($sqlba);

$sqlbc="INSERT INTO ticket_price 
VALUES('','$sid','Balcony','Child','$bcprice')";
mysql_query($sqlbc);
}

$msg="A Schedule has been added....";
header("location:schedulemanagement.php?msg=$msg");








?>