<?php
$email=$_GET['email'];
require_once("include/dbconnection_inc.php");

if(preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',$email)){

$sqlemail="SELECT * FROM audience WHERE email='$email'";
$resultemail=mysql_query($sqlemail);
$no=mysql_num_rows($resultemail);

if($no==1){
	echo '<img src="images/no.png" width="30" 
height="auto" />';
}else{

echo '<img src="images/yes.png" width="30" 
height="auto" />';
	
}		
}else{
		echo '<img src="images/no.png" width="30" 
height="auto" />';	
}



?>