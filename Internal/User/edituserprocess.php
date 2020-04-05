<?php
require_once("../include/dbconnection_inc.php");
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$email=$_POST['email'];

$urole=$_POST['urole'];
$uid=$_REQUEST['uid'];

	$sql="UPDATE system_user SET firstname='$fname',lastname='$lname',
	email='$email',user_role_id='$urole' WHERE user_id='$uid'"; 
	mysql_query($sql) or die(mysql_error());
	
	if($_POST['pass']){
		$pass=sha1($_POST['pass']);
	$sqlp="UPDATE system_user SET password='$pass' WHERE user_id='uid'";	
		mysql_query($sqlp);
	}
	
	header("Location:usermanagement.php");








?>