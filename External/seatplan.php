<?php 
session_start();
require_once("include/dbconnection_inc.php");
$sid=$_REQUEST['sid'];
$_SESSION['sid']=$sid;
$session_id=$_SESSION['session_id'];
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND 
ts.time_slot_id=s.time_slot_id  
AND schedule_id='$sid'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);

$drama_id=$row['drama_id'];
$drama_name=$row['drama_name'];
$time_slot_id=$row['time_slot_id'];
$description=$row['description'];
$date=$row['date'];


//To get ticket prices

if(isset($_POST['con'])){
$_SESSION['seatcat']=$seatcat=$_POST['seatcat'];
$_SESSION['noseats']=$noseats=$_POST['noseats'];
$_SESSION['fticket']=$fticket=$_POST['fticket'];
$_SESSION['htickets']=$htickets=$_POST['htickets'];
}else{
$seatcat=$_SESSION['seatcat'];
$noseats=$_SESSION['noseats'];
$fticket=$_SESSION['fticket'];
$htickets=$_SESSION['htickets'];	
}
if($fticket!=0){
		
}else{
	$fticket=0;	
}
$a="Adult";
if($htickets!=0){
		
}else{
	$htickets=0;	
}
$c="Child";
function getP($p){
	global $sid; global $seatcat;
$sqlprice="SELECT * FROM ticket_price 
WHERE schedule_id='$sid' AND category='$seatcat' AND type='$p'";
$resultprice=mysql_query($sqlprice);
$rowprice=mysql_fetch_array($resultprice);
return $rowprice['price'];
}

$_SESSION['pricef']=$pricef=getP($a)*$fticket;
$_SESSION['priceh']=$priceh=getP($c)*$htickets;

$_SESSION['total']=$total=$pricef+$priceh;


$count=1;
$spr=12;

  if($seatcat=="Gallery"){
			   $count=12; $c=4;$c1=4;$c2=8;$sn=0;
			   $r=6; $sc="GS";
			   }else{
				$count=18; $c=6;$c1=6;$c2=12;$sn=0; 
				$r=3;  
				$sc="BS";
			   }
$ts=time();			   
$resres = mysql_query("SELECT * FROM booking WHERE bstatus='Pending' GROUP BY session_id");
while($rowres=mysql_fetch_array($resres)){
	$comid=$rowres['session_id'];
	if(($ts-$rowres['btime'])>300){
		$resresdel = mysql_query("DELETE FROM booking WHERE session_id='$comid' AND  bstatus='Pending'");	
	}
}
			   
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BMICH</title>

<!-- favicon (to display logo)-->
<link rel="icon" href="images/logo2 copy1.png">

<link href="common/bootstrap.min.css" rel="stylesheet">

<link href="common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/clear.js"></script>
<script type="text/javascript" src="../js/formvalidation.js"></script>


<script src="common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="common/js/jquery-ui.js" type="text/javascript"></script>
<script src="common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'common/js/facebox/loading.gif',
        closeImage   : 'common/js/facebox/closelabel.png'
      });
    })
</script>

<script src="common/bootstrap.min.js"></script>
<script src="common/jquery.min.js"> </script>
<script src="jquery-1.7.1.min.js"> </script>
<script src="slides.min.jquery.js"> </script>
<link type="text/css" rel="stylesheet" href="jq.css">

<link href="CSS/layoutin.css" rel="stylesheet" type="text/css"/>
<link href="CSS/layout.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquerislideshow.js"></script>
<script>
function bookSeat(s,ref)
	
          {
			var sref=s+"/"+ref; 
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }   
            xmlhttp.onreadystatechange=function()
            {
              document.getElementById("books").innerHTML = '<img src="images/loading.gif" alt="Please Wait" align="middle" />';

              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                document.getElementById("books").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","functionajaxseat.php?seat="+sref,true);
            xmlhttp.send();            
          }
</script>

</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header_pro.php"); ?>       
<div id="inner_header"></div></div>
<div id="navi"><?php require_once("common/navi_pro.php"); ?></div>
      

<div id="content" 
style="padding-left:100px; padding-right:100px;
min-height:600px">
<p></p>
<div style="color:#000; background-color:#F2F2F2; color:black;
height:40px; padding-top:1px;" align="center" > 
<span style="font-size:24px; color:#A49999">1</span>
<span style="font-size:16px;padding-right:10px; 
color:#A49999">Select Preferences</span> 
<span style="font-size:24px; color:black">2</span>
<span style="font-size:16px;padding-right:10px;color:blackfont-weight:bold;">
Seat Plan</span> 
<span style="font-size:24px;color:#A49999" >3</span>
<span style="font-size:16px;padding-right:10px;color:#A49999">
Confirm Booking</span> 
<span style="font-size:24px;color:#A49999">4</span>
<span style="font-size:16px;padding-right:10px;
color:#A49999">Make Payment</span> 
 </div>
 <p></p>



<h4 align="center" style="color:#000"> Seat Arrangement
- <?php echo $seatcat; ?> </h4>
<h4> No of Seat for Booking:  <?php echo $_SESSION['noseats']; ?></h4>
<?php if(isset($_REQUEST['msg'])){ ?>
<div class="alert-warning" align="center"><?php echo $_REQUEST['msg']; ?></div>
	
	
<?php }?>
<P><button type="button" class="btn btn-primary">
            <?php echo $sc; ?></button> - Availabale
        <button type="button" class="btn btn-success">
            <?php echo $sc; ?></button> - Selected
            <button type="button" class="btn btn-warning" style="background:red">
            <?php echo $sc; ?></button> - Booked    
            
            </P>
<div id="books" style="min-height::300px">&nbsp;
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
</p></div>
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
<table class="table table-hover" style="color:black">
  <form method="post" action="booking_confirm_pre.php?sid=<?php echo $sid; ?>">
    <tr>
      <td height="41" colspan="7"><strong>Contact Information</strong></td>
    </tr>
    <tr>
      <td height="43" colspan="2">Contact Name</td>
      <td height="43"><input type="text" name="name" id="name" size="50"
           value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>"  /></td>
      <td width="22%" height="43">Contact Number (947xxxxx)</td>
      <td width="27%"><input type="text" name="number" id="number" 
           value="<?php echo $_SESSION['mobile']; ?>" /></td>
    </tr>
    <tr>
      <td height="31" colspan="2">E-mail</td>
      <td height="31"><input type="text" name="email" id="email"
          value="<?php echo $_SESSION['email']; ?>" /></td>
      <td height="31">Remark
        <label><em>(optional)</em></label></td>
      <td height="31"><input type="text" name="remark" id="remark" /></td>
    </tr>
    <tr>
      <td height="25" colspan="2">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="1" align="center">
      <a href="release.php?sid=<?php echo $sid; ?>"><button type="button" name="release" 
          class="btn btn-primary" style="background:black">&lt;&lt;Release</button></a></td>
          
            <td colspan="5" align="center">&nbsp;</td>
            <td colspan="1" align="center"><button type="submit" name="search" 
          class="btn btn-primary" style="background:black">Proceed &gt;&gt;</button></td>
    </tr>
  </form>
</table>
</div>
</div>



<div id="net">

<div>
      <ul class="nav navbar-nav" style="margin-right:10%; margin-left:10%; margin-top:50px">
        <li style="width:50px"><img src="images/fb.jpg" width="30" height="30"></li>
        <li style="width:50px"><img src="images/g.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/tw.jpg" width="30" height="30"></li>
       <li style="width:50px"><img src="images/ut.jpg" width="30" height="30"></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
</div>

<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Loch  |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>