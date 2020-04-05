<?php
if(!isset($_SESSION)) session_start();
if($_SESSION['username']=="" && $_SESSION['password']==""){
	header("Location:../login/index.php");
	exit;	
}
?>