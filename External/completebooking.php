<?php 
session_start();
require_once("include/dbconnection_inc.php");
include("common/phpqrcode/phpqrcode.php");
$sid=$_SESSION['sid'];
$session_id=$_SESSION['session_id'];
$total=$_SESSION['total'];
$bdate=date("Y-m-d");
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND 
ts.time_slot_id=s.time_slot_id  
AND schedule_id='$sid'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);

$pm="paypal";

$drama_id=$row['drama_id'];
$drama_name=$row['drama_name'];
$time_slot_id=$row['time_slot_id'];
$description=$row['description'];
$date=$row['date'];

//To get ticket prices
$sqlb="SELECT * FROM booking
WHERE session_id='$session_id'";
$resultb=mysql_query($sqlb);

//To get ticket prices
$sqlprice="SELECT * FROM ticket_price 
WHERE schedule_id='$sid'";
$resultprice=mysql_query($sqlprice);

$sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
$resultd=mysql_query($sqld);
$dirarray=array();
while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}
	
	$p=mysql_query("INSERT INTO payment VALUES ('','$total','$session_id','$bdate','$pm')");
$pid=mysql_insert_id();
	
	mysql_query("UPDATE booking set bstatus='Complete' WHERE session_id='$session_id'");
	
	
$f="qr/".$pid.".png";
$str="Reference No: ".$pid."\n Drama Name ".$drama_id."\n Date ".$date."\n Time ".$description;
QRcode::png('code data text', $f); // creates file 	 

  
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>NMPT</title>

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
<p> <br /> <a href="release.php?sid=<?php echo $sid; ?>"><button type="button" name="release" 
          class="btn btn-primary" style="background:black">Booking</button></a></p>
<table border="0" width="60%" align="center" style="color:black">
          <tr>
            <td width="26%">Ref No:<?php echo $pid; ?></td>
            <td width="40%" align="center"><p>E-Ticket</p></td>
            <td width="34%">Date: <?php echo date("Y-m-d"); ?>&nbsp;</td>
            </tr>
          <tr>
            <td height="316" colspan="3" align="center">
              
              <table width="50%" class="table table-bordered" style="color:black">
                <tr>
                  <td width="48%"><span class="pa">Drama Name</span></td>
                  <td width="52%"><?php echo $drama_name; ?>&nbsp;</td>
                  </tr>
                <tr>
                  <td>Total Amount (RS)</td>
                  <td><?php echo $_SESSION['total']; ?>&nbsp;</td>
                  </tr>
                <tr>
                  <td>Date AND Time</td>
                  <td><?PHP echo $date." (".$description.")"; ?>&nbsp;</td>
                  </tr>
                <tr>
                  <td>Payment Method</td>
                  <td><?PHP echo $pm; ?>&nbsp;</td>
                  </tr>
                <tr>
                  <td>Seat Reference</td>
                  <td>
                    <table border="1" style="color:black"><tr>
                      <?php
               
	while($rowb=mysql_fetch_assoc($resultb)){
	echo "<td>".$rowb['seatref']."</td>";
	}
                ?></tr>
                      </table>
                    &nbsp;</td>
                  </tr>
                <tr>
                  <td>Contact Name</td>
                  <td><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>&nbsp;</td>
                  </tr>
                <tr>
                  <td>Mobile Number</td>
                  <td><?php echo $_SESSION['mobile']; ?>&nbsp;</td>
                  </tr>
                <tr>
                  <td>Email Address</td>
                  <td><?php echo $_SESSION['email']; ?>&nbsp;</td>
                  </tr>
           
                <tr>
                  <td height="22">&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                </table>
                
                <p align="center"></p>
                </td>
            </tr>
          </table>

<table border="0" width="60%" align="center" style="color:black">
          <tr>
            <td width="26%">
<a href="qrcode.php?sid=<?php echo $pid; ?>" target="_blank">
 <button type="button" name="pdf" class="btn btn-primary" style="background:black">QR CODE</span></button>
 
 </a>
 
            </td>
            <td width="40%" align="center"><p>&nbsp;</p></td>
            <td width="34%">
 <a href="eticketpdf.php?sid=<?php echo $pid; ?>" target="_blank">
 <button type="button" name="pdf" class="btn btn-primary" style="background:black">PDF</span></button></a>&nbsp;

            
            &nbsp;</td>
            </tr>
            </table>




</div>



<div id="net">

<div>
      <ul class="nav navbar-nav" style="margin-right:10%; margin-left:10%; margin-top:50px">
        <li style="width:50px"><img src="images/fb.jpg" width="30" height="30"></li>
        <li style="width:50px"><img src="images/g.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/tw.jpg" width="30" height="30"></li>
       <li style="width:50px"><img src="images/ut.jpg" width="30" height="30"></li>
       
      </ul>
    </div>
</div>

<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Loch |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>