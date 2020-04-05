<?php
require_once("../include/dbconnection_inc.php");
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);
$urole=$_POST['urole'];

$sql="SELECT * FROM system_user WHERE username='$uname'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count!=0){
	$msg="User Name is exsiting...";
	header("Location:usermanagement.php?msg=$msg");	
}else{
	$sqlin="INSERT INTO system_user 
	VALUES('','$fname','$lname','$email','','$urole','$uname','$pass')"; 
	mysql_query($sqlin);
	
	
	header("Location:usermanagement.php");
}







?>