<?php
session_start(); //to start sesstion
require_once("../include/dbconnection_inc.php");
$drama_id=$_REQUEST['did'];
$sql=mysql_fetch_array(mysql_query("SELECT image FROM drama WHERE drama_id='$drama_id'"));
$sqldeld="DELETE FROM drama WHERE drama_id='$drama_id'";
$sqldeldd="DELETE FROM dir_drama WHERE drama_id='$drama_id'";

if(mysql_query($sqldeld) && mysql_query($sqldeldd)){
	
	
	$path="drama_image/".$sql['image'];
	unlink($path);
	$msg="A Drama has been deleted....";	
}
header("Location:dramamanagement.php?msg=$msg");



?>