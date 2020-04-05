<?php
$scheduleid=$_REQUEST['schedule_id'];
require_once("../include/dbconnection_inc.php");
$scheduleid="DELETE FROM schedule WHERE schedule_id='$scheduleid'";

$reuschedule=mysql_query($scheduleid);

if($reuschedule){
	$msg="A shedule has been deleted...";
	header("Location:schedulemanagement.php?msg=$msg");	
}


?>