<?php
session_start(); //To start a session
//To get data from form using POST method
if($_POST['uname']=="" || $_POST['pass']==""){ //Server side validation
	$msg="Empty User Name or Password";
	header("Location:index.php?msg=$msg");	
}

$uname=$_POST['uname'];
$pass=sha1($_POST['pass']);//Encryption (hash function - one way)

//To connect database
require_once("../include/dbconnection_inc.php");

//Mysql query
$sql="SELECT * FROM system_user s,user_role u WHERE s.username='$uname' AND
s.password='$pass' AND s.user_role_id=u.user_role_id";
//To execute
$result=mysql_query($sql);
//To count rows 
$nor=mysql_num_rows($result);
if($nor!=0){ //If a user is existing
//To separate data
$row=mysql_fetch_array($result);
$_SESSION['firstname']=$firstname=$row['firstname']; //Assign into session
$_SESSION['lastname']=$lastname=$row['lastname'];
$_SESSION['user_id']=$user_id=$row['user_id'];
$_SESSION['email']=$email=$row['email'];
$_SESSION['user_role_id']=$user_role_id=$row['user_role_id'];
$_SESSION['username']=$username=$row['username'];
$_SESSION['user_image']=$user_image=$row['user_image'];
$_SESSION['password']=$password=$row['password'];
$_SESSION['user_role_name']=$user_role_name=$row['user_role_name'];
	header("Location:usermenu.php");
}else{
	$msg="Invalid User Name or Password";	
	header("Location:index.php?msg=$msg"); //redirect to another page 
}



















?>