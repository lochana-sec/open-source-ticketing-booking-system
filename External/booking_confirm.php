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
$sqlprice="SELECT * FROM ticket_price 
WHERE schedule_id='$sid'";
$resultprice=mysql_query($sqlprice);

$sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
$resultd=mysql_query($sqld);
$dirarray=array();
while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}
		   
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

<div style="color:#000; background-color:#F2F2F2; color:black;
height:40px; padding-top:1px;" align="center" > 
<span style="font-size:24px; color:#A49999">1</span>
<span style="font-size:16px;padding-right:10px; 
color:#A49999">Select Preferences</span> 
<span style="font-size:24px; color:#A49999">2</span>
<span style="font-size:16px;padding-right:10px;color:#A49999;">
Seat Plan</span> 
<span style="font-size:24px;color:BLACK" >3</span>
<span style="font-size:16px;padding-right:10px;color:black;font-weight:bold;">
Confirm Booking</span> 
<span style="font-size:24px;color:#A49999">4</span>
<span style="font-size:16px;padding-right:10px;
color:#A49999">Make Payment</span> 
 </div>
 <p></p>



<h4 align="center" style="color:#000"> Confirm  Seat Booking Details
 </h4>
<table align="center" class="table table-hover" style="color:black">

        <tr>
          <td height="41" colspan="3"><strong>Drama Information</strong></td>
        </tr>
         <tr>
           <td height="25">
      <table width="600" class="table table-hover" style="color:black">
 
    <tr>
      <td colspan="2" rowspan="3">&nbsp;
      <img src='../Internal/drama/drama_image/<?php echo $row['image']; ?>' width="100" height="auto" />
      </td>
      <td width="18%" height="43"><b>Drama Name :</b></td>
      <td width="18%" height="43"><?php echo $drama_name; ?>&nbsp;</td>
      <td width="23%"><b>Category :</b></td>
      <td width="17%"><?php echo $row['drama_cat']; ?>&nbsp;</td>
    </tr>
    <tr>
      <td height="31"><b>Year :</b></td>
      <td height="31"><?php echo $row['intro_year']; ?>&nbsp;</td>
      <td height="31"><b>Language :</b></td>
      <td><?php echo $row['language']; ?>&nbsp;</td>
    </tr>
    <tr>
      <td height="31"><b>Director</b></td>
      <td height="31" colspan="3">
      <?php echo implode(",",$dirarray); ?>
      
      &nbsp;</td>
      </tr>
           </table>
           
           </td>
           </tr>
           </table>

   <?php
		 $sqlselected="SELECT * FROM booking WHERE schedule_id='$sid' AND bstatus='Pending'
		 AND session_id='$session_id'";
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
  
    <tr>
      <td height="41" colspan="7"><strong>Ticket Price</strong></td>
    </tr>
    <tr>
      <td height="43" colspan="2">Rs. <?php echo $_SESSION['total']; ?>
      (Full Ticket Price :<?php echo $_SESSION['pricef']; ?>)-
      Half Ticket Price :<?php echo $_SESSION['priceh']; ?></td>
      <td height="43">&nbsp;</td>
      <td width="22%" height="43">&nbsp;</td>
      <td width="27%">&nbsp;</td>
    </tr>
    </table>
    
<table class="table table-hover" style="color:black">
  
    <tr>
      <td height="41" colspan="7"><strong>Contact Information</strong></td>
    </tr>
    <tr>
      <td height="43" colspan="2">Contact Name</td>
      <td height="43"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></td>
      <td width="22%" height="43">Contact Number (947xxxxx)</td>
      <td width="27%"><?php echo $_SESSION['mobile']; ?></td>
    </tr>
    <tr>
      <td height="31" colspan="2">E-mail</td>
      <td height="31"><?php echo $_SESSION['email']; ?></td>
      <td height="31">Remark
        <label><em>(optional)</em></label></td>
      <td height="31">&nbsp;</td>
    </tr>
    <tr>
      <td height="25" colspan="2">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="1" align="center">
     <?php
        function paypal_items()
  {
	  global $session_id;
    $num=0;
	$t=$_SESSION['total'];
	$t1=round(($t/133),2);
	    //$id=substr($name,5,strlen($name)-5);
		$get=mysql_query("SELECT * FROM booking b,schedule s,drama d
		WHERE b.session_id='$session_id' AND b.schedule_id=s.schedule_id 
		AND d.drama_id=s.drama_id GROUP BY b.session_id");
			$get1=mysql_query("SELECT * FROM booking b WHERE b.session_id='$session_id'");
			//$a=mysql_num_rows($get1);
		while($get_row=mysql_fetch_assoc($get))
		{
			$up=$t1;
			
		  $num++;
		  echo '<input type="hidden" name="item_number_'.$num.'" value="'.$get_row['session_id'].'">';
		  echo '<input type="hidden" name="item_name_'.$num.'" value="'.$get_row['drama_name'].'">';
		  echo '<input type="hidden" name="amount_'.$num.'" value="'.$up.'">';
		  
		 
		}
	
  }
  ?>
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="nmpt@gmail.com">
<?php  paypal_items(); ?>
<input type="hidden" name="item_name" value="Drama Name">
<input type="hidden" name="currency_code" value="Rs">

	
	<input type="hidden" name="return" 
    value="http://localhost/DTBS_NMPT/External/completebooking.php">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="cbt" value="Return to Drama Booking Site">
	<input type="hidden" name="cancel_return" 
    value="http//localhost/DTBS_NMPT/External/index.php">
	
	
	
   <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but02.gif" name="submit" value="Pay" id="pay" alt="Make payments with PayPal - it's fast, free and secure!"></a>
</form>

      
      
      
      
      </td>
          <td colspan="4" align="center">&nbsp;</td>
          <td colspan="1" align="center">
          <a href="release.php"><button type="button" name="search" 
          class="btn btn-primary" style="background:black">Reset Booking</button>
          </a></td>
    </tr>
  
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
       
      </ul>
    </div>
</div>

<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo1">Site Designed by Loch |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>