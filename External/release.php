<?php 
session_start();
require_once("include/dbconnection_inc.php");
$sid=$_REQUEST['sid'];
unset($_SESSION['seatcat']);
unset($_SESSION['noseats']);
unset($_SESSION['fticket']);
unset($_SESSION['htickets']);



unset($_SESSION['pricef']);
unset($_SESSION['priceh']);

unset($_SESSION['total']);
$session_id=$_SESSION['session_id'];
mysql_query("DELETE FROM booking WHERE session_id='$session_id'");
$_SESSION['session_id']=$_SESSION['audience_id']."-".time();

header("Location:index.php");
