<?php 
error_reporting(0);
session_start(); //to start sesstion
require_once("../include/dbconnection_inc.php");
$dname=$_POST['dname'];
$dcat=$_POST['dcat'];
$perform=$_POST['perform'];
$ddes=$_POST['ddes'];
$year=$_POST['year'];
$lan=$_POST['lan'];
$country=$_POST['country'];

//Insert an image
if($_FILES['image']['name']!=""){
$image=$_FILES['image']['name'];
$tempimage=$_FILES['image']['tmp_name'];

$id=time(); //Time Stamp
$new_name=$id."_".$image; //New image name
$path="drama_image/".$new_name; //New location
copy($tempimage,$path); //To move the image into new location


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

$sqld="insert into drama values 
('','$dname','$dcat', '$perform', '$ddes', '$year',
'$new_audio','$new_video','$lan','$country' ,'$user_id',
'$new_name','$c_date')";
$result=mysql_query($sqld) or die (mysql_error());

//To get last ID
$last_ID=mysql_insert_id();

//Directors
$director=$_POST['director'];
foreach($director as $e){
	$sqlin="INSERT INTO dir_drama VALUES ('$last_ID','$e')";
	mysql_query($sqlin);
	
}
$msg="A drama has been added....";
header("Location:dramamanagement.php?msg=$msg");

?>