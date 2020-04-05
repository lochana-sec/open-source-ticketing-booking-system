<?php
session_start();
if($_POST['email']=="" || $_POST['pwd']==""){ //Server side validation
	$msg="Empty User Name or Password";
	header("Location:index.php?msg=$msg");	
}
$email=$_POST['email'];
$pwd=sha1($_POST['pwd']);
require_once("include/dbconnection_inc.php");
$sql="SELECT * FROM audience WHERE email='$email' AND
password='$pwd' ";
//To execute
$result=mysql_query($sql);
//To count rows 
echo $nor=mysql_num_rows($result);

if($nor!=0){ //If a user is existing
$status=1;
$msg="Welcome";

$row=mysql_fetch_assoc($result);
$_SESSION['audience_id']=$row['audience_id'];
$sid=$row['audience_id']."-".time();
$_SESSION['fname']=$row['fname'];
$_SESSION['lname']=$row['lname'];
$_SESSION['email']=$row['email'];
$_SESSION['mobile']=$row['mobile'];
$_SESSION['password']=$row['password'];
$_SESSION['session_id']=$sid;
$_SESSION['status']=1;


header("Location:index.php?msg=$msg&status=$status");
}
else{
	$_SESSION['status']=0;
	$status=0;
	$msg="Invalid User Name or Password";	
	header("Location:index.php?msg=$msg&status=$status"); 
	//redirect to index page 
}

?>