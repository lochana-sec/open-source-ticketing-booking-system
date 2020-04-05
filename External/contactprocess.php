$<?php
require_once("include/dbconnection_inc.php");

$name=$_POST['name'];
$pname=$_POST['pname'];
$email=$_POST['email'];
$mess=$_POST['mess'];


 



$sql="insert into contect VALUES('','$name','$pname','$email','$mess')";

 $resultemail=mysql_query($sql);
header("location:contactus.php");


?>