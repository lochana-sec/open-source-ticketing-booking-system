<?php
session_start(); //to start sesstion
//include("include/session_handling.php");
require_once("include/dbconnection_inc.php");
$drama_id=$_REQUEST['did'];
$sql="SELECT * FROM drama WHERE drama_id='$drama_id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
$resultd=mysql_query($sqld);
$dirarray=array();
while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}
?>
<html>
<head>
<title>User Menu</title>
<!-- To call Extenal CSS -->
<link rel="stylesheet" type="text/css" href="css/layoutin.css" />

<link href="common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>

<link rel="icon" href="images/drama/Drama200x200.png" />

<!-- To link JS -->

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="500px" border="0" style="color:#000">
  <tr>
    <td><h3><?php echo $row['drama_name']; ?></h3></td>
  </tr>
  <tr>
    <td><table width="500" border="0" style="color:#000">
      <tr>
        <td width="32%" rowspan="6">
        
        <?php if($row['image']==""){ ?>
		<img src='../Internal/drama/drama_image/drama2.png' width="75" height="auto" />
	
    <?php }else{?>
		<img src='../Internal/drama/drama_image/<?php echo $row['image']; ?>' width="75" height="auto" />
        
        <?php
	 }
	?>
        
        &nbsp;</td>
        <td width="20%"><strong>Director(s)</strong></td>
        <td width="48%">
        <?php echo implode(",",$dirarray); ?>
        
        &nbsp;</td>
      </tr>
      <tr>
        <td><strong>Year</strong></td>
        <td><?php echo $row['intro_year']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Language</strong></td>
        <td><?php echo $row['language']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Country</strong></td>
        <td><?php echo $row['country']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Category</strong></td>
        <td><?php echo $row['drama_cat']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="but"><strong>Performing</strong></td>
  </tr>
  <tr>
    <td height="67"><?php echo $row['performing']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="but"><strong>Description</strong></td>
  </tr>
  <tr>
    <td height="49"><?php echo $row['drama_des']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="but"><strong>Video</strong></td>
  </tr>
  <tr>
    <td height="133" align="center">
    <?php if($row['video_clip']==""){ ?>
    		No Video
    <?php }else{ ?>
    
    <video controls width="100%" height="auto">
	<source src="../Internal/drama/drama_video/<?php echo $row['video_clip']; ?>" type="video/mp4">
	Your browser does not support the audio element.
	</video>
    
    <!-- <embed src="drama_video/<?php // echo $row['video_clip']; ?>"
     width="100%" height="auto" autoplay="false" /> -->
     
    <?php } ?>
    &nbsp;</td>
  </tr>
  <tr>
    <td height="36"class="but"><strong>Audio</strong></td>
  </tr>
  <tr>
    <td align="center"> <?php if($row['audio_clip']==""){ ?>
    		No Audio
    <?php }else{ ?>
   <audio controls>

<source src="../Internal/drama/drama_audio/<?php echo $row['audio_clip']; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
   
       <!-- <embed src="drama_audio/<?php // echo $row['audio_clip']; ?>"  
       autoplay="no" width="100%" height="auto" /> -->
    <?php } ?>&nbsp;</td>
  </tr>
</table>
</body>
</html>