<?php 
session_start();
require_once("include/dbconnection_inc.php");
$sid=$_REQUEST['sid'];
$_SESSION['sid']=$sid;
$session_id=$_SESSION['session_id'];


//To get ticket prices
$sql="SELECT * FROM booking
WHERE session_id='$session_id'";
$result=mysql_query($sql);
$nos=mysql_num_rows($result);

if($_SESSION['noseats']==$nos){
header("Location:booking_confirm.php?sid=$sid");
}else{
	$msg="Please Select all seats";
?>

<script>
	alert("Please Select all seats");
	</script>
<?php
header("Location:seatplan.php?sid=$sid&msg=$msg");	
}