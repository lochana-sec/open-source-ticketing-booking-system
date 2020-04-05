<?php 
require_once("include/dbconnection_inc.php");
$title=$_POST['title'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['radio'];
$y=$_POST['year'];
$m=$_POST['month'];
$d=$_POST['date'];
$dob=$y."-".$m."-".$d;
$nic=$_POST['nic'];
$address=$_POST['address'];
$city=$_POST['city'];
$district=$_POST['district'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);

$sqlemail="SELECT * FROM audience WHERE email='$email'";
$resultemail=mysql_query($sqlemail);
$no=mysql_num_rows($resultemail);

if($no==0){
$sqla= "INSERT INTO audience VALUES
('', '$title', '$fname', '$lname', '$gender', '$dob', '$nic', '$address', 
'$city', '$mobile', '$email', '$pass', '$district')" ;
if(mysql_query($sqla)){
	$msg="A Client has been registered";
}else{
	$msg=mysql_error();
}
header("Location:login.php?msg=$msg");
}else{
	$msg="Email is existing.......";
header("Location:clientregistration.php?msg=$msg");	
}

  

?>