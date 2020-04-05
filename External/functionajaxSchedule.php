<?php
session_start();
$seat=$_GET['seat'];
$arr=explode("/",$seat);
$seat_id=$arr[0];
$seatref=$arr[1];
$sid=$_SESSION['sid'];
$session_id=$_SESSION['session_id'];
$audience_id=$_SESSION['audience_id'];
$seatcat=$_SESSION['seatcat'];
$nos=$_SESSION['noseats'];
$bstatus="Pending";
$ts=time();
$bdate=date("Y-m-d");
require_once("include/dbconnection_inc.php");

$sqlse="SELECT * FROM booking WHERE schedule_id='$sid' AND bstatus='Pending' AND session_id='$session_id'";
			$resultse=mysql_query($sqlse);
			  $cose=mysql_num_rows($resultse);
if($cose<$nos){
$sqlin="INSERT INTO booking 
	VALUES('','$sid','$audience_id','$seat_id','$session_id','$seatcat',
	'$seatref','$bstatus','$ts')"; 
	mysql_query($sqlin);
}else{
	echo "Exceeed";	
}




$count=1;
$spr=12;
$seatcat=$_SESSION['seatcat'];
  if($seatcat=="Gallery"){
			   $count=12; $c=4;$c1=4;$c2=8;$sn=0;
			   $r=5; $sc="GS";
			   }else{
				$count=18; $c=6;$c1=6;$c2=12;$sn=0; 
				$r=2;  
				$sc="BS";
			   }
/* $resres = $conn->query("SELECT * FROM reservation WHERE rstatus='Pending' GROUP BY commuter_id");
while($rowres=$resres->fetch_array()){
	$comid=$rowres['commuter_id'];
	if(($ts-$rowres['bts'])>300){
		$resresdel = $conn->query("DELETE FROM reservation WHERE commuter_id='$comid' AND  rstatus='Pending'");	
	}
}

$resultcom = $conn->query("SELECT * FROM compartment where com_id='$com_id'");
	$rowcom=$resultcom->fetch_array(MYSQLI_ASSOC);
	$nos=$rowcom['nos'];
	$mid=round($nos/2,2);
	$spr=round($nos/4,0);
	$count=1;
	$resultseat = $conn->query("SELECT * FROM seat where com_id='$com_id'");
$resultseat1 = $conn->query("SELECT * FROM seat where com_id='$com_id'");

$res1 = $conn->query("SELECT * FROM reservation WHERE rdate='$rdate' AND seat_id='$sid'");
$rowcount=$res1->num_rows;
if($rowcount==0){
$res2 = $conn->query("SELECT * FROM reservation WHERE commuter_id='$bookid'");
$rowcount2=$res2->num_rows;
if($rowcount2<5){
$r=$conn->query("INSERT INTO reservation VALUES ('','$sid','$rdate','$bookid','$rstatus','$bdate','$ts','$train_id','$source','$destination')");
$rid=$conn->insert_id;
$conn->query("INSERT INTO reservation_seat VALUES ('$rid','','','')");
}else{
echo "<center><font color='red'>Already Five seats have been selected</font></center>";	
}

}else{
$conn->query("DELETE FROM reservation where seat_id='$sid' AND rdate='$rdate'");	
}
*/
?>
<link href="common/bootstrap.min.css" rel="stylesheet">
<p align="center">


<br />
               <?php
			 
			  for($i=0;$i<=$r;$i++){ 
			  
			  
			  ?>
		  		<p align="center"><?php for($j=1;$j<=$count;$j++){
					$sn++; ?>
                 
                 
                 
                 <span title="<?php echo "GS".$i."-".$j; ?>">
                 
               <?php 
			   
			$sql="SELECT * FROM booking WHERE schedule_id='$sid' AND seat_id='$sn'";
			$result=mysql_query($sql);
			  $co=mysql_num_rows($result);
			  
			   if($co==0){?>    
			<button type="button" class="btn btn-primary"
             value="<?php echo $sc.$i."-".$j; ?>"
            onclick="bookSeat('<?php echo $sn; ?>',this.value)">
            <?php echo $sc; ?></button>
            <?php }else{
				$row=mysql_fetch_array($result);
            	if($row['session_id']==$session_id){
					?>
                    <button class="btn btn-success"><?PHP echo $sc; ?></button>
                    <?php
				}else{
					?>
				<button class="btn btn-warning" style="background:red"><?PHP echo $sc; ?></button>
                    <?php
				}
            
            } ?>
			<?php if($j==$c1){
					echo "&nbsp;"; 
				 }
				 if($j==$c2){
					echo "&nbsp;"; 
				 }
				  ?>
                   </span> 
                   <?php } ?>
                 
                
              <?PHP
			  $count=$count+2;
			 $c1=$c1+1;
			 $c2=$c1+$c;
			  }
		   ?>
               
         </p> 
         
         <?php
		 $sqlselected="SELECT * FROM booking WHERE schedule_id='$sid' AND bstatus='Pending' AND
		  session_id='$session_id'";
			$resultselected=mysql_query($sqlselected);
		 ?>
<table align="center" class="table table-hover" style="color:black">

        <tr>
          <td height="41" colspan="3"><strong>Seat Information</strong></td>
        </tr>
         <tr>
           <td height="25">
           <table border="1" style="color:black"><tr>
           <?php 
		   
		   while($rowselected=mysql_fetch_array($resultselected)){ ?>
           <td width='150px'><i class="glyphicon glyphicon-bookmark"></i>
           <?php
		   echo $rowselected['seatref']; 
		   }
		   ?>
           </td>
           </tr>
           </table>
           
           </td>
           </tr>
           </table>