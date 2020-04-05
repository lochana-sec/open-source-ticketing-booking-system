<?php
$user_id=$_REQUEST['user_id'];
require_once("../include/dbconnection_inc.php");
$userdel="DELETE FROM system_user WHERE user_id='$user_id'";

$reuserdel=mysql_query($userdel);

if($reuserdel){
	$msg="A User has been deleted...";
	header("Location:usermanagement.php?msg=$msg");	
}


?>