<?php
error_reporting(0);
session_start(); //to start sesstion
require_once("../include/dbconnection_inc.php");
echo $dname=$_POST['dname'];
$dcat=$_POST['dcat'];
$perform=$_POST['perform'];
$ddes=$_POST['ddes'];
$year=$_POST['year'];
$lan=$_POST['lan'];
$country=$_POST['country'];
echo $did=$_REQUEST['did'];

$sqlupdate="UPDATE drama SET drama_name='$dname',drama_cat='$dcat',performing='$perform',
 drama_des='$ddes',intro_year='$year',language='$lan',country='$country' WHERE drama_id='$did'";
$r=mysql_query($sqlupdate) or die(mysql_error());


mysql_query("DELETE FROM dir_drama WHERE drama_id='$did'");
//Directors
$director=$_POST['director'];
foreach($director as $e){
	$sqlin="INSERT INTO dir_drama VALUES ('$did','$e')";
	mysql_query($sqlin);
	
}


//Insert an image
if($_FILES['image']['name']!=""){
$image=$_FILES['image']['name'];
$tempimage=$_FILES['image']['tmp_name'];

$id=time(); //Time Stamp
$new_name=$id."_".$image; //New image name


$path="drama_image/".$new_name; //New location
copy($tempimage,$path); //To move the image into new location
$sqlupdate1="UPDATE drama SET image='$new_name' WHERE drama_id='$did'";
$r1=mysql_query($sqlupdate1);

}else{
$new_name="";	
}

$user_id=$_SESSION['user_id'];

//$audio=$_FILES['audio']['name'];

//Insert an audio
if($_FILES['audio']['name']!=""){
$audio=$_FILES['audio']['name'];
$tempaudio=$_FILES['audio']['tmp_name'];

$id=time(); //Time Stamp
$new_audio=$id."_".$audio; //New audio name
$sqlupdate2="UPDATE drama SET drama_audio='$new_audio' WHERE drama_id='$did'";
$r2=mysql_query($sqlupdate2);
$patha="drama_audio/".$new_audio; //New location
copy($tempaudio,$patha); //To move the audio into new location


}else{
$new_audio="";	
}

//Insert an video
if($_FILES['video']['name']!=""){
$video=$_FILES['video']['name'];
$tempvideo=$_FILES['video']['tmp_name'];

$id=time(); //Time Stamp
$new_video=$id."_".$video; //New video name
$sqlupdate3="UPDATE drama SET drama_video='$new_video' WHERE drama_id='$did'";
$r3=mysql_query($sqlupdate3);
$pathv="drama_video/".$new_video; //New location
copy($tempvideo,$pathv); //To move the video into new location
}else{
$new_video="";	
}

//$tempa=$_FILES['audio']['tmp_name'];

//$video=$_FILES['video']['name'];
//$tempv=$_FILES['video']['tmp_name'];

//To get the current date
$c_date=date("Y-m-d");
//To insert drama details 


	

if($r){
	
	
	$msg=base64_encode("Drama Details Successfully Edited");
	
	
	
	}else{
		$msg=base64_encode("Successfully Not Edited" or die(mysql_error()));
		
		
		}

header("Location:dramamanagement.php?msg=$msg");


?>