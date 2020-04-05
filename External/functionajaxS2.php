<?php
session_start();
$s2=$_GET['s2'];

$bdate=date("Y-m-d");
require_once("include/dbconnection_inc.php");

$sql1="SELECT * FROM drama d,schedule s,time_slot ts WHERE  d.drama_id=s.drama_id 
AND ts.time_slot_id=s.time_slot_id AND d.drama_id='$s2' AND s.date>'$bdate'";
$result1=mysql_query($sql1);
/*$sqlse="SELECT * FROM booking WHERE schedule_id='$sid' AND bstatus='Pending' AND session_id='$session_id'";
			$resultse=mysql_query($sqlse);
			  $cose=mysql_num_rows($resultse);
			  */
?>


 <?php while ($row1=mysql_fetch_array($result1)){?>
 <table width="500" border="0" class="table" style="color:black;">
  <tr>
    <td rowspan="2">
    
    <?php if($row1['image']==""){ ?>
		<img src='../internal/drama/drama_image/drama2.png' width="100" height="auto" />
	
    <?php }else{?>
		<img src='../internal/drama/drama_image/<?php echo $row1['image']; ?>' width="100" height="auto" />
        
        <?php
	}
	?>&nbsp;</td>
    <td colspan="3"><?php echo $row1['drama_name']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $row1['description']; ?>&nbsp;</td>
    <td><?php echo $row1['date']; ?>&nbsp;</td>
    <td>
    
         <?php
   
    if(isset($_SESSION['status']) && 
 $_SESSION['status']==1){ ?>
<a href="dramabooking.php?sid=<?php 
 echo $row1['schedule_id'];?>">
 <button type="button" class="btn btn-success">
  Booking</button> </a>
 <?php }else { ?> 
  <button type="button" class="btn btn-default"
  onClick="javascript:alert('Please Login to continue');">
  Booking</button>
  <?php } ?>
    &nbsp;</td>
  </tr></table><hr />
  <?php } ?>

